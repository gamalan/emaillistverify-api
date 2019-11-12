<?php

namespace Gamalan\EmailListVerify;

class SingleResult
{
    const VALIDATION_FAIL = 'fail';
    const VALIDATION_UNKNOWN = 'unknown';
    const VALIDATION_INCORRECT = 'incorrect';
    const VALIDATION_KEY_NOT_VALID = 'key_not_valid';
    const VALIDATION_MISSING_PARAMETER = 'missing parameters';

    const VALIDATION_OK = 'ok';
    const VALIDATION_OK_FOR_ALL = 'ok_for_all';
    const VALIDATION_ACCEPT_ALL = 'accept_all';
    const VALIDATION_SMTP_ERROR = 'smtp_error';
    const VALIDATION_SMTP_PROTOCOL = 'smtp_protocol';
    const VALIDATION_UNKNOWN_EMAIL = 'unknown_email';
    const VALIDATION_ATTEMPT_REJECTED = 'attempt_rejected';
    const VALIDATION_RELAY_ERROR = 'relay_error';
    const VALIDATION_ANTISPAM_SYSTEM = 'antispam_system';
    const VALIDATION_EMAIL_DISABLED = 'email_disabled';
    const VALIDATION_DOMAIN_ERROR = 'domain_error';
    const VALIDATION_DEAD_SERVER = 'dead_server';
    const VALIDATION_DISPOSABLE = 'disposable';
    const VALIDATION_SPAM_TRAP = 'spam_traps';
    const VALIDATION_SYNTAX_ERROR = 'syntax_error';

    protected $email, $status;

    public function __construct($email, $status)
    {
        $this->email = $email;
        $this->status = $status;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }
}
