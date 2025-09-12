<?php

namespace App\Model;

enum EstadoCivil: string
{
    case Solteiro = 'Solteiro';
    case Casado = 'Casado';
    case Divorciado = 'Divorciado';
    case Viuvo = 'Viúvo';
    case NaoInformado = 'Não informado';

}