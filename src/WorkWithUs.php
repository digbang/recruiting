<?php
namespace Digbang;

use Illuminate\Console\Command;
use Illuminate\Contracts\Config\Repository;
use Illuminate\Contracts\Mail\Mailer;
use Illuminate\Contracts\Validation\Factory;

class WorkWithUs extends Command
{
    const MAIL_TO = 'rrhh@digbang.com';
    const MAIL_SUBJECT = 'Contacto de %s';

    protected $signature = 'i-want-to:work-at:digbang';

    protected $description = '';

    public function handle(Repository $config, Factory $validation, Mailer $mailer)
    {
        $data      = $config->get('recruitment');
        $validator = $validation->make($data, [
            'name'  => 'required',
            'email' => 'required|email',
            'cv'    => 'required|cv',
        ], [
            'cv.cv' => 'CV must be an accessible file to attach or a valid url'
        ]);

        if ($validator->fails()) {
            foreach ($validator->getMessageBag()->all() as $field => $error) {
                $this->error($error);
            }

            return 1;
        }

        $fol = new FileOrLink($data['cv']);
        $data['cvFol'] = $fol;

        $mailer->send('digbang::mail', $data, function($mail) use ($data, $fol) {
            $mail
                ->from($data['email'])
                ->to(self::MAIL_TO)
                ->subject(sprintf(self::MAIL_SUBJECT, $data['name']));

            if($fol->isFile())
            {
                $mail->attach($data['cv']);
            }
        });

        $this->info('Gracias por tu contacto. ¡Nos comunicaremos dentro de poco!');
    }
}
