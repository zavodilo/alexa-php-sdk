<?php

namespace Skollro\Alexa;

use JsonSerializable;
use MaxBeckers\AmazonAlexa\Response\Card;
use MaxBeckers\AmazonAlexa\Response\OutputSpeech;
use MaxBeckers\AmazonAlexa\Response\Response as AlexaResponse;

class Response implements JsonSerializable
{
    protected $response;

    public function __construct()
    {
        $this->response = new AlexaResponse;
        $this->response->shouldEndSession = true;
    }

    public function say($text)
    {
        $this->response->response->outputSpeech = OutputSpeech::createByText($text);
        return $this;
    }

    public function linkAccount()
    {
        $this->response->response->card = new Card(Card::TYPE_LINK_ACCOUNT);
        return $this;
    }

    public function jsonSerialize()
    {
        return $this->response;
    }
}