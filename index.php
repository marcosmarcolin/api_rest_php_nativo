<?php

use Util\ConstantesGenericasUtil;
use Util\JsonUtil;
use Validator\RequestValidator;

require_once('bootstrap.php');

try {
    $RequestValidator = new RequestValidator();
    $RequestValidator->tratarRequest();
    $retorno = $RequestValidator->processarRequest();

    $JsonUtil = new JsonUtil();
    $JsonUtil->processarArrayParaRetornar($retorno);

} catch (Exception $exception) {
    echo json_encode([
        ConstantesGenericasUtil::TIPO => ConstantesGenericasUtil::TIPO_ERRO,
        ConstantesGenericasUtil::RESPOSTA => utf8_encode($exception->getMessage())
    ], JSON_THROW_ON_ERROR, 512);
    exit;
}


