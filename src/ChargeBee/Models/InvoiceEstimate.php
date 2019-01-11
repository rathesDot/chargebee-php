<?php

namespace Chargebee\Chargebee\Models;

use Chargebee\Chargebee\Model;

class InvoiceEstimate extends Model
{
    protected $allowed = ['recurring', 'priceType', 'currencyCode', 'subTotal', 'total', 'creditsApplied',
        'amountPaid', 'amountDue', 'lineItems', 'discounts', 'taxes', 'lineItemTaxes', 'lineItemTiers', 'lineItemDiscounts', 'roundOffAmount', ];

    // OPERATIONS
  //-----------
}
