<?php

declare(strict_types=1);

namespace GAYA\UploadWidgetExample\Controller;

use Psr\Http\Message\ResponseInterface;
use GAYA\UploadWidget\Service\UploadService;
use GAYA\UploadWidgetExample\Domain\Repository\ExampleRepository;
use GAYA\UploadWidgetExample\Domain\Model\Example;
use GAYA\UploadWidgetExample\Domain\Model\Dto\ExampleForm;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Annotation as Extbase;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use TYPO3\CMS\Extbase\Utility\LocalizationUtility;

class ExampleController extends ActionController
{
    public function __construct(
        private ExampleRepository $exampleRepository,
        private UploadService $uploadService
    ) {
    }

    public function editAction(ExampleForm $candidatureForm = null): ResponseInterface
    {
        if ($candidatureForm === null) {
            $candidatureForm = new ExampleForm();
        }

        $this->view->assign('candidatureForm', $candidatureForm);
        $this->view->assign('civiliteOptions', [
            1 =>  LocalizationUtility::translate('LLL:EXT:upload_widget_example/Resources/Private/Language/locallang_db.xlf:civilite.1'),
            2 =>  LocalizationUtility::translate('LLL:EXT:upload_widget_example/Resources/Private/Language/locallang_db.xlf:civilite.2'),
            3 =>  LocalizationUtility::translate('LLL:EXT:upload_widget_example/Resources/Private/Language/locallang_db.xlf:civilite.3'),
        ]);
        return $this->htmlResponse();
    }

    public function createAction(ExampleForm $exampleForm)
    {
        /** @var Example $example */
        $example = GeneralUtility::makeInstance(Example::class);

        $example->setFirstname($exampleForm->getFirstname());
        $example->setLastname($exampleForm->getLastname());
        $example->setFile(
            $this->uploadService->createExtbaseFileReferenceFromFile(
                $this->uploadService->getFile($exampleForm->getFile()),
                'tx_uploadwidgetexample_domain_model_example'
            )
        );

        $this->exampleRepository->add($example);

        $this->redirect('confirmation');
    }

    public function confirmationAction(): ResponseInterface
    {
        return $this->htmlResponse();
    }
}
