<?php

namespace Gamalan\EmailListVerify\Test;


use Dotenv\Dotenv;
use Gamalan\EmailListVerify\EmailListVerify;
use Gamalan\EmailListVerify\SingleResult;
use PHPUnit\Framework\TestCase;

class BaseTest extends TestCase
{
    protected $BASE_DIR;
    protected $client;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->BASE_DIR = dirname(__DIR__) . DIRECTORY_SEPARATOR;
        try {
            $dotenv = new Dotenv(realpath($this->BASE_DIR));
            $dotenv->load();
            $this->client = new EmailListVerify(getenv('EMAIL_LIST_VERIFY_API'));
        } catch (\Throwable $e) {

        }
    }

    public function testInstance()
    {
        $this->assertInstanceOf(EmailListVerify::class, $this->client);
    }

    public function testAPIRunning()
    {
        $this->assertInstanceOf(SingleResult::class, $this->client->verifyEmail('postmaster@gmail.com'));
    }
}
