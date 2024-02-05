<?php

namespace Genesizadmin\GenesizCore\Domain\UI\Components\Feedback;

use Genesizadmin\GenesizCore\Domain\UI\HasInlineAttributes;
use Illuminate\Http\Request;

class ConfirmModal
{
    use HasInlineAttributes;

    private Request $request;

    public static function make($title)
    {
        return new static($title);
    }

    public function __construct($title)
    {
        $this->request = request();
        $this->setAttribute('title', $title);
        $this->setDefaultConfirmAction();

        return $this;
    }

    public function request(Request $request)
    {
        $this->request = $request;
        return $this;
    }

    public function content(string $content)
    {
        $this->setAttribute('content', $content);
        return $this;
    }

    private function setDefaultConfirmAction()
    {
        $this->setAttribute('confirmAction', [
            'url' => $this->request->url(),
            'method' => $this->request->method(),
            'payload' => null,
            'headers' => [
                'X-Larant-Confirmed' => 1
            ]
        ]);
    }

    public function onConfirm($url, $method = 'get')
    {
        $this->setAttribute('confirmAction', [
            'url' => $url,
            'method' => $method,
            'payload' => null,
            'headers' => [
                'X-Larant-Confirmed' => 1
            ]
        ]);
        return $this;
    }

    public function show()
    {

        // show modal if no confirmation header
        if (!request()->hasHeader('X-Larant-Confirmed')) {

            $msg = $this->getAttributes();

            session()->flash('_confirm', $msg);

            back()->throwResponse();
        }
    }
}
