<?php

namespace FondOfSpryker\Shared\Prepayment;

interface PrepaymentConstants
{
    const PROVIDER_NAME = 'Prepayment';
    const LAST_NAME_FOR_INVALID_TEST = 'Invalid';
    const PAYMENT_METHOD_PREPAYMENT = 'prepayment';
    const PREPAYMENT_PROPERTY_PATH = self::PAYMENT_METHOD_PREPAYMENT . self::PROVIDER_NAME;

    const ACCOUNT_HOLDER = 'ACCOUNT_HOLDER';
    const IBAN = 'IBAN';
    const BIC = 'BIC';
    const CUSTOM_TEXT = 'CUSTOM_TEXT';
}
