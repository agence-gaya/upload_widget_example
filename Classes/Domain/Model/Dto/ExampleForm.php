<?php

declare(strict_types=1);

namespace GAYA\UploadWidgetExample\Domain\Model\Dto;

use TYPO3\CMS\Extbase\Annotation as Extbase;

class ExampleForm
{
    /**
     * @var string
     * @Extbase\Validate("NotEmpty")
     * @Extbase\Validate("stringLength", options={"maximum": 255})
     */
    protected string $firstname = '';

    /**
     * @var string
     * @Extbase\Validate("NotEmpty")
     * @Extbase\Validate("stringLength", options={"maximum": 255})
     */
    protected string $lastname = '';

    /**
     * @var string
     * @Extbase\Validate("NotEmpty")
     * @Extbase\Validate("\GAYA\UploadWidget\Validation\Validator\ProtectedFileUidValidator")
     */
    protected string $file = '';

    public function getFirstname(): string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): void
    {
        $this->firstname = $firstname;
    }

    public function getLastname(): string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): void
    {
        $this->lastname = $lastname;
    }

    public function getFile(): string
    {
        return $this->file;
    }

    public function setFile(string $file): void
    {
        $this->file = $file;
    }
}
