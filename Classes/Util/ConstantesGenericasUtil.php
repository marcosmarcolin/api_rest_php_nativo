<?php

namespace Util;

abstract class ConstantesGenericasUtil
{
    /* REQUESTS */
    public const TIPO_REQUEST = ['GET', 'POST', 'DELETE', 'PUT'];
    public const TIPO_GET = ['USUARIOS'];
    public const TIPO_POST = ['USUARIOS'];
    public const TIPO_DELETE = ['USUARIOS'];
    public const TIPO_PUT = ['USUARIOS'];

    /* ERROS */
    public const MSG_ERRO_TIPO_ROTA = 'Rota n�o permitida!';
    public const MSG_ERRO_RECURSO_INEXISTENTE = 'Recurso inexistente!';
    public const MSG_ERRO_GENERICO = 'Algum erro ocorreu na requisi��o!';
    public const MSG_ERRO_SEM_RETORNO = 'Nenhum registro encontrado!';
    public const MSG_ERRO_NAO_AFETADO = 'Nenhum registro afetado!';
    public const MSG_ERRO_TOKEN_VAZIO = '� necess�rio informar um Token!';
    public const MSG_ERRO_TOKEN_NAO_AUTORIZADO = 'Token n�o autorizado!';
    public const MSG_ERR0_JSON_VAZIO = 'O Corpo da requisi��o n�o pode ser vazio!';

    /* SUCESSO */
    public const MSG_DELETADO_SUCESSO = 'Registrado deletado com Sucesso!';
    public const MSG_ATUALIZADO_SUCESSO = 'Registrado atualizado com Sucesso!';

    /* RECURSO USUARIOS */
    public const MSG_ERRO_ID_OBRIGATORIO = 'ID � obrigat�rio!';
    public const MSG_ERRO_LOGIN_EXISTENTE = 'Login j� existente!';
    public const MSG_ERRO_LOGIN_SENHA_OBRIGATORIO = 'Login e Senha s�o obrigat�rios!';

    /* RETORNO JSON */
    const TIPO_SUCESSO = 'sucesso';
    const TIPO_ERRO = 'erro';

    /* OUTRAS */
    public const SIM = 'S';
    public const TIPO = 'tipo';
    public const RESPOSTA = 'resposta';
}