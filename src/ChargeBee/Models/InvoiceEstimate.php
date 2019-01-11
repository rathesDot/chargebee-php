<?php

namespace Chargebee\Chargebee\Models;

class ChargeBee_InvoiceEstimate extends ChargeBee_Model
{
    protected $allowed = ['recurring', 'priceType', 'currencyCode', 'subTotal', 'total', 'creditsApplied',
        'amountPaid', 'amountDue', 'lineItems', 'discounts', 'taxes', 'lineItemTaxes', 'lineItemTiers', 'lineItemDiscounts', 'roundOffAmount', ];

    // OPERATIONS
  //-----------
}
