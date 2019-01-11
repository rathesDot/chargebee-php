<?php

namespace Chargebee\Chargebee\Models;

use Chargebee\Chargebee\Model;

class ChargeBee_InvoiceEstimate extends Model
{
    protected $allowed = ['recurring', 'priceType', 'currencyCode', 'subTotal', 'total', 'creditsApplied',
        'amountPaid', 'amountDue', 'lineItems', 'discounts', 'taxes', 'lineItemTaxes', 'lineItemTiers', 'lineItemDiscounts', 'roundOffAmount', ];

    // OPERATIONS
  //-----------
}
