<?php

namespace Chargebee\Chargebee\Models;

use Chargebee\Chargebee\Model;

class CreditNoteEstimate extends Model
{
    protected $allowed = ['referenceInvoiceId', 'type', 'priceType', 'currencyCode', 'subTotal', 'total',
        'amountAllocated', 'amountAvailable', 'lineItems', 'discounts', 'taxes', 'lineItemTaxes', 'lineItemDiscounts', 'lineItemTiers', 'roundOffAmount', ];

    // OPERATIONS
  //-----------
}
