<?php

namespace olcaytaner\Propbank;

enum ArgumentType
{
    case NONE;
    case PREDICATE;
    case ARG0;
    case ARG1;
    case ARG2;
    case ARG3;
    case ARG4;
    case ARG5;
    case ARGMNONE;
    case ARGMEXT;
    case ARGMLOC;
    case ARGMDIS;
    case ARGMADV;
    case ARGMCAU;
    case ARGMTMP;
    case ARGMPNC;
    case ARGMMNR;
    case ARGMDIR;
}