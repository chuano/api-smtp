<?php
declare(strict_types=1);

namespace App\Controller;


use App\Service\SmtpMailer;
use App\Service\JsonResponser;
use Exception;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class SendSmtpEmailController
{
    private $mailer;
    private $responser;

    public function __construct(SmtpMailer $mailer, JsonResponser $responser)
    {
        $this->mailer = $mailer;
        $this->responser = $responser;
    }

    /**
     * @Route("/send_smtp_email", methods={"POST","GET"})
     */
    public function sendMailAction(Request $request)
    {
        try {
            $data = $this->getRequestData($request);
            $this->mailer->sendMail($data);
        } catch (Exception $exception) {
            return $this->responser->response($exception->getMessage(), 500);
        }

        return $this->responser->response('E-Mail sent.', 200);
    }

    /**
     * @throws Exception
     */
    private function checkParameters($data)
    {
        $params = ['host', 'port', 'encryption', 'username', 'password', 'email', 'to', 'subject', 'body'];
        foreach ($params as $param) {
            if (!key_exists($param, $data)) {
                throw new Exception(
                    'The request must have all parameters: ' .
                    'host, port, encryption, username,  password, email, to, subject, body'
                );
            }
        }
    }

    /**
     * @throws Exception
     */
    private function getRequestData(Request $request): array
    {
        $data = json_decode($request->getContent(), true);
        $this->checkParameters($data);

        return $data;
    }
}