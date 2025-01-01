<?php

namespace olcaytaner\Propbank;

class ArgumentTypeStatic
{

    /**
     * The getArguments method takes an argumentsType string and returns the {@link ArgumentType} form of it.
     *
     * @param string $argumentsType Type of the argument in string form
     * @return ArgumentType Type of the argument in {@link ArgumentType} form
     */
    public static function getArguments(string $argumentsType): ArgumentType
    {
        return match (strtoupper($argumentsType)) {
            "ARG0" => ArgumentType::ARG0,
            "ARG1" => ArgumentType::ARG1,
            "ARG2" => ArgumentType::ARG2,
            "ARG3" => ArgumentType::ARG3,
            "ARG4" => ArgumentType::ARG4,
            "ARG5" => ArgumentType::ARG5,
            "ARGMADV" => ArgumentType::ARGMADV,
            "ARGMCAU" => ArgumentType::ARGMCAU,
            "ARGMDIR" => ArgumentType::ARGMDIR,
            "ARGMDIS" => ArgumentType::ARGMDIS,
            "ARGMEXT" => ArgumentType::ARGMEXT,
            "ARGMLOC" => ArgumentType::ARGMLOC,
            "ARGMMNR" => ArgumentType::ARGMMNR,
            "ARGMTMP" => ArgumentType::ARGMTMP,
            "ARGMNONE" => ArgumentType::ARGMNONE,
            "ARGMPNC" => ArgumentType::ARGMPNC,
            "PREDICATE" => ArgumentType::PREDICATE,
            default => ArgumentType::NONE,
        };
    }

    /**
     * The getPropbankType method takes an argumentType in {@link ArgumentType} form and returns the string form of it.
     *
     * @param ArgumentType|null $argumentType Type of the argument in {@link ArgumentType} form
     * @return string Type of the argument in string form
     */
    public static function getPropBankType(ArgumentType $argumentType = null): string
    {
        if ($argumentType == null)
            return "NONE";
        return match ($argumentType) {
            ArgumentType::ARG0 => "ARG0",
            ArgumentType::ARG1 => "ARG1",
            ArgumentType::ARG2 => "ARG2",
            ArgumentType::ARG3 => "ARG3",
            ArgumentType::ARG4 => "ARG4",
            ArgumentType::ARG5 => "ARG5",
            ArgumentType::ARGMADV => "ARGMADV",
            ArgumentType::ARGMCAU => "ARGMCAU",
            ArgumentType::ARGMDIR => "ARGMDIR",
            ArgumentType::ARGMDIS => "ARGMDIS",
            ArgumentType::ARGMEXT => "ARGMEXT",
            ArgumentType::ARGMLOC => "ARGMLOC",
            ArgumentType::ARGMMNR => "ARGMMNR",
            ArgumentType::ARGMTMP => "ARGMTMP",
            ArgumentType::ARGMNONE => "ARGMNONE",
            ArgumentType::ARGMPNC => "ARGMPNC",
            ArgumentType::PREDICATE => "PREDICATE",
            default => "NONE",
        };
    }
}