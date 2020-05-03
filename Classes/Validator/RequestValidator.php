<?php

namespace Validator;

use InvalidArgumentException;
use Repository\TokensAutorizadosRepository;
use Service\UsuariosService;
use Util\ConstantesGenericasUtil;
use Util\JsonUtil;

class RequestValidator
{
    private array $request;
    private array $dadosRequest;
    private object $TokensAutorizadosRepository;

    const GET = 'GET';
    const DELETE = 'DELETE';
    const USUARIOS = 'USUARIOS';

    /**
     * RequestValidator constructor.
     * @param array $request
     */
    public function __construct($request = [])
    {
        $this->TokensAutorizadosRepository = new TokensAutorizadosRepository();
        $this->request = $request;
    }

    /**
     * @return array|mixed|string|null
     */
    public function processarRequest()
    {
        $retorno = utf8_encode(ConstantesGenericasUtil::MSG_ERRO_TIPO_ROTA);
        if (in_array($this->request['metodo'], ConstantesGenericasUtil::TIPO_REQUEST, true)) {
            $retorno = $this->direcionarRequest();
        }
        return $retorno;
    }

    /**
     * Metodo para direcionar o tipo de Request
     * @return array|mixed|string|null
     */
    private function direcionarRequest()
    {
        if ($this->request['metodo'] !== self::GET && $this->request['metodo'] !== self::DELETE) {
            $this->dadosRequest = JsonUtil::tratarCorpoRequisicaoJson();
        }
        $this->TokensAutorizadosRepository->validarToken(getallheaders()['Authorization']);
        $metodo = $this->request['metodo'];
        return $this->$metodo();
    }

    /**
     * Metodo para tratar os DELETES
     * @return mixed|string
     */
    private function delete()
    {
        $retorno = utf8_encode(ConstantesGenericasUtil::MSG_ERRO_TIPO_ROTA);
        if (in_array($this->request['rota'], ConstantesGenericasUtil::TIPO_DELETE, true)) {
            switch ($this->request['rota']) {
                case self::USUARIOS:
                    $UsuariosService = new UsuariosService($this->request);
                    $retorno = $UsuariosService->validarDelete();
                    break;
                default:
                    throw new InvalidArgumentException(ConstantesGenericasUtil::MSG_ERRO_RECURSO_INEXISTENTE);
            }
        }
        return $retorno;
    }

    /**
     * Metodo para tratar os GETS
     * @return array|mixed|string
     */
    private function get()
    {
        $retorno = utf8_encode(ConstantesGenericasUtil::MSG_ERRO_TIPO_ROTA);
        if (in_array($this->request['rota'], ConstantesGenericasUtil::TIPO_GET, true)) {
            switch ($this->request['rota']) {
                case self::USUARIOS:
                    $UsuariosService = new UsuariosService($this->request);
                    $retorno = $UsuariosService->validarGet();
                    break;
                default:
                    throw new InvalidArgumentException(ConstantesGenericasUtil::MSG_ERRO_RECURSO_INEXISTENTE);
            }
        }
        return $retorno;
    }

    /**
     * Metodo para tratar os POSTS
     * @return array|null|string
     */
    private function post()
    {
        $retorno = null;
        if (in_array($this->request['rota'], ConstantesGenericasUtil::TIPO_POST, true)) {
            switch ($this->request['rota']) {
                case self::USUARIOS:
                    $UsuariosService = new UsuariosService($this->request);
                    $UsuariosService->setDadosCorpoRequest($this->dadosRequest);
                    $retorno = $UsuariosService->validarPost();
                    break;
                default:
                    throw new InvalidArgumentException(ConstantesGenericasUtil::MSG_ERRO_TIPO_ROTA);
            }
            return $retorno;
        }
        throw new InvalidArgumentException(ConstantesGenericasUtil::MSG_ERRO_TIPO_ROTA);
    }

    /**
     * Metodo para tratar os PUTS
     * @return array|null|string
     */
    private function put()
    {
        $retorno = null;
        if (in_array($this->request['rota'], ConstantesGenericasUtil::TIPO_PUT, true)) {
            switch ($this->request['rota']) {
                case self::USUARIOS:
                    $UsuariosService = new UsuariosService($this->request);
                    $UsuariosService->setDadosCorpoRequest($this->dadosRequest);
                    $retorno = $UsuariosService->validarPut();
                    break;
                default:
                    throw new InvalidArgumentException(ConstantesGenericasUtil::MSG_ERRO_TIPO_ROTA);
            }
            return $retorno;
        }
        throw new InvalidArgumentException(ConstantesGenericasUtil::MSG_ERRO_TIPO_ROTA);
    }
}
