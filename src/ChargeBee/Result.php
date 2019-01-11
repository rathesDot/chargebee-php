<?php

namespace Chargebee\Chargebee;

class Result
{
    private $_response;

    private $_responseObj;

    public function __construct($_response)
    {
        $this->_response = $_response;
        $this->_responseObj = [];
    }

    public function subscription()
    {
        return $this->_get(
            'subscription',
            'Subscription',
        ['addons' => 'SubscriptionAddon', 'event_based_addons' => 'SubscriptionEventBasedAddon', 'charged_event_based_addons' => 'SubscriptionChargedEventBasedAddon', 'coupons' => 'SubscriptionCoupon', 'shipping_address' => 'SubscriptionShippingAddress', 'referral_info' => 'SubscriptionReferralInfo']
        );
    }

    public function customer()
    {
        return $this->_get(
            'customer',
            'Customer',
        ['billing_address' => 'CustomerBillingAddress', 'referral_urls' => 'CustomerReferralUrl', 'contacts' => 'CustomerContact', 'payment_method' => 'CustomerPaymentMethod', 'balances' => 'CustomerBalance']
        );
    }

    public function contact()
    {
        return $this->_get('contact', 'Contact');
    }

    public function paymentSource()
    {
        return $this->_get(
            'payment_source',
            'PaymentSource',
        ['card' => 'PaymentSourceCard', 'bank_account' => 'PaymentSourceBankAccount', 'amazon_payment' => 'PaymentSourceAmazonPayment', 'paypal' => 'PaymentSourcePaypal']
        );
    }

    public function thirdPartyPaymentMethod()
    {
        return $this->_get('third_party_payment_method', 'ThirdPartyPaymentMethod');
    }

    public function virtualBankAccount()
    {
        return $this->_get('virtual_bank_account', 'VirtualBankAccount');
    }

    public function card()
    {
        return $this->_get('card', 'Card');
    }

    public function promotionalCredit()
    {
        return $this->_get('promotional_credit', 'PromotionalCredit');
    }

    public function invoice()
    {
        return $this->_get(
            'invoice',
            'Invoice',
        ['line_items' => 'InvoiceLineItem', 'discounts' => 'InvoiceDiscount', 'line_item_discounts' => 'InvoiceLineItemDiscount', 'taxes' => 'InvoiceTax', 'line_item_taxes' => 'InvoiceLineItemTax', 'line_item_tiers' => 'InvoiceLineItemTier', 'linked_payments' => 'InvoiceLinkedPayment', 'applied_credits' => 'InvoiceAppliedCredit', 'adjustment_credit_notes' => 'InvoiceAdjustmentCreditNote', 'issued_credit_notes' => 'InvoiceIssuedCreditNote', 'linked_orders' => 'InvoiceLinkedOrder', 'notes' => 'InvoiceNote', 'shipping_address' => 'InvoiceShippingAddress', 'billing_address' => 'InvoiceBillingAddress']
        );
    }

    public function creditNote()
    {
        return $this->_get(
            'credit_note',
            'CreditNote',
        ['line_items' => 'CreditNoteLineItem', 'discounts' => 'CreditNoteDiscount', 'line_item_discounts' => 'CreditNoteLineItemDiscount', 'line_item_tiers' => 'CreditNoteLineItemTier', 'taxes' => 'CreditNoteTax', 'line_item_taxes' => 'CreditNoteLineItemTax', 'linked_refunds' => 'CreditNoteLinkedRefund', 'allocations' => 'CreditNoteAllocation']
        );
    }

    public function unbilledCharge()
    {
        return $this->_get(
            'unbilled_charge',
            'UnbilledCharge',
        ['tiers' => 'UnbilledChargeTier']
        );
    }

    public function order()
    {
        return $this->_get(
            'order',
            'Order',
        ['order_line_items' => 'OrderOrderLineItem', 'shipping_address' => 'OrderShippingAddress', 'billing_address' => 'OrderBillingAddress', 'line_item_taxes' => 'OrderLineItemTax', 'line_item_discounts' => 'OrderLineItemDiscount', 'linked_credit_notes' => 'OrderLinkedCreditNote']
        );
    }

    public function gift()
    {
        return $this->_get(
            'gift',
            'Gift',
        ['gifter' => 'GiftGifter', 'gift_receiver' => 'GiftGiftReceiver', 'gift_timelines' => 'GiftGiftTimeline']
        );
    }

    public function transaction()
    {
        return $this->_get(
            'transaction',
            'Transaction',
        ['linked_invoices' => 'TransactionLinkedInvoice', 'linked_credit_notes' => 'TransactionLinkedCreditNote', 'linked_refunds' => 'TransactionLinkedRefund', 'linked_payments' => 'TransactionLinkedPayment']
        );
    }

    public function hostedPage()
    {
        return $this->_get('hosted_page', 'HostedPage');
    }

    public function estimate()
    {
        $estimate = $this->_get(
            'estimate',
            'Estimate',
            [],
        ['subscription_estimate' => 'SubscriptionEstimate', 'invoice_estimate' => 'InvoiceEstimate', 'invoice_estimates' => 'InvoiceEstimate', 'next_invoice_estimate' => 'InvoiceEstimate', 'credit_note_estimates' => 'CreditNoteEstimate', 'unbilled_charge_estimates' => 'UnbilledCharge']
        );
        $estimate->_initDependant(
            $this->_response['estimate'],
            'subscription_estimate',
        ['shipping_address' => 'SubscriptionEstimateShippingAddress']
        );
        $estimate->_initDependant(
            $this->_response['estimate'],
            'invoice_estimate',
        ['line_items' => 'InvoiceEstimateLineItem', 'discounts' => 'InvoiceEstimateDiscount', 'taxes' => 'InvoiceEstimateTax', 'line_item_taxes' => 'InvoiceEstimateLineItemTax', 'line_item_tiers' => 'InvoiceEstimateLineItemTier', 'line_item_discounts' => 'InvoiceEstimateLineItemDiscount']
        );
        $estimate->_initDependant(
            $this->_response['estimate'],
            'next_invoice_estimate',
        ['line_items' => 'InvoiceEstimateLineItem', 'discounts' => 'InvoiceEstimateDiscount', 'taxes' => 'InvoiceEstimateTax', 'line_item_taxes' => 'InvoiceEstimateLineItemTax', 'line_item_tiers' => 'InvoiceEstimateLineItemTier', 'line_item_discounts' => 'InvoiceEstimateLineItemDiscount']
        );
        $estimate->_initDependantList(
            $this->_response['estimate'],
            'invoice_estimates',
        ['line_items' => 'InvoiceEstimateLineItem', 'discounts' => 'InvoiceEstimateDiscount', 'taxes' => 'InvoiceEstimateTax', 'line_item_taxes' => 'InvoiceEstimateLineItemTax', 'line_item_tiers' => 'InvoiceEstimateLineItemTier', 'line_item_discounts' => 'InvoiceEstimateLineItemDiscount']
        );
        $estimate->_initDependantList(
            $this->_response['estimate'],
            'credit_note_estimates',
        ['line_items' => 'CreditNoteEstimateLineItem', 'discounts' => 'CreditNoteEstimateDiscount', 'taxes' => 'CreditNoteEstimateTax', 'line_item_taxes' => 'CreditNoteEstimateLineItemTax', 'line_item_discounts' => 'CreditNoteEstimateLineItemDiscount', 'line_item_tiers' => 'CreditNoteEstimateLineItemTier']
        );
        $estimate->_initDependantList(
            $this->_response['estimate'],
            'unbilled_charge_estimates',
        ['tiers' => 'UnbilledChargeTier']
        );

        return $estimate;
    }

    public function quote()
    {
        return $this->_get(
            'quote',
            'Quote',
        ['line_items' => 'QuoteLineItem', 'discounts' => 'QuoteDiscount', 'line_item_discounts' => 'QuoteLineItemDiscount', 'taxes' => 'QuoteTax', 'line_item_taxes' => 'QuoteLineItemTax', 'shipping_address' => 'QuoteShippingAddress', 'billing_address' => 'QuoteBillingAddress']
        );
    }

    public function plan()
    {
        return $this->_get(
            'plan',
            'Plan',
        ['tiers' => 'PlanTier', 'applicable_addons' => 'PlanApplicableAddon', 'attached_addons' => 'PlanAttachedAddon', 'event_based_addons' => 'PlanEventBasedAddon']
        );
    }

    public function addon()
    {
        return $this->_get(
            'addon',
            'Addon',
        ['tiers' => 'AddonTier']
        );
    }

    public function coupon()
    {
        return $this->_get('coupon', 'Coupon');
    }

    public function couponSet()
    {
        return $this->_get('coupon_set', 'CouponSet');
    }

    public function couponCode()
    {
        return $this->_get('coupon_code', 'CouponCode');
    }

    public function address()
    {
        return $this->_get('address', 'Address');
    }

    public function event()
    {
        return $this->_get(
            'event',
            'Event',
        ['webhooks' => 'EventWebhook']
        );
    }

    public function comment()
    {
        return $this->_get('comment', 'Comment');
    }

    public function download()
    {
        return $this->_get('download', 'Download');
    }

    public function portalSession()
    {
        return $this->_get(
            'portal_session',
            'PortalSession',
        ['linked_customers' => 'PortalSessionLinkedCustomer']
        );
    }

    public function siteMigrationDetail()
    {
        return $this->_get('site_migration_detail', 'SiteMigrationDetail');
    }

    public function resourceMigration()
    {
        return $this->_get('resource_migration', 'ResourceMigration');
    }

    public function timeMachine()
    {
        return $this->_get('time_machine', 'TimeMachine');
    }

    public function export()
    {
        return $this->_get(
            'export',
            'Export',
        ['download' => 'ExportDownload']
        );
    }

    public function unbilledCharges()
    {
        return $this->_getList(
            'unbilled_charges',
            'UnbilledCharge',
        ['tiers' => 'UnbilledChargeTier']
        );
    }

    public function creditNotes()
    {
        return $this->_getList(
            'credit_notes',
            'CreditNote',
        ['line_items' => 'CreditNoteLineItem', 'discounts' => 'CreditNoteDiscount', 'line_item_discounts' => 'CreditNoteLineItemDiscount', 'line_item_tiers' => 'CreditNoteLineItemTier', 'taxes' => 'CreditNoteTax', 'line_item_taxes' => 'CreditNoteLineItemTax', 'linked_refunds' => 'CreditNoteLinkedRefund', 'allocations' => 'CreditNoteAllocation']
        );
    }

    public function invoices()
    {
        return $this->_getList(
            'invoices',
            'Invoice',
        ['line_items' => 'InvoiceLineItem', 'discounts' => 'InvoiceDiscount', 'line_item_discounts' => 'InvoiceLineItemDiscount', 'taxes' => 'InvoiceTax', 'line_item_taxes' => 'InvoiceLineItemTax', 'line_item_tiers' => 'InvoiceLineItemTier', 'linked_payments' => 'InvoiceLinkedPayment', 'applied_credits' => 'InvoiceAppliedCredit', 'adjustment_credit_notes' => 'InvoiceAdjustmentCreditNote', 'issued_credit_notes' => 'InvoiceIssuedCreditNote', 'linked_orders' => 'InvoiceLinkedOrder', 'notes' => 'InvoiceNote', 'shipping_address' => 'InvoiceShippingAddress', 'billing_address' => 'InvoiceBillingAddress']
        );
    }

    public function toJson()
    {
        return json_encode($this->_response);
    }

    private function _getList($type, $class, $subTypes = [], $dependantTypes = [], $dependantSubTypes = [])
    {
        if (!array_key_exists($type, $this->_response)) {
            return null;
        }
        if (!array_key_exists($type, $this->_responseObj)) {
            $setVal = [];
            foreach ($this->_response[$type] as $stV) {
                $obj = new $class($stV, $subTypes, $dependantTypes);
                foreach ($dependantSubTypes as $k => $v) {
                    $obj->_initDependant($stV, $k, $v);
                }
                array_push($setVal, $obj);
            }
            $this->_responseObj[$type] = $setVal;
        }

        return $this->_responseObj[$type];
    }

    private function _get($type, $class, $subTypes = [], $dependantTypes = [])
    {
        if (!array_key_exists($type, $this->_response)) {
            return null;
        }
        if (!array_key_exists($type, $this->_responseObj)) {
            $this->_responseObj[$type] = new $class($this->_response[$type], $subTypes, $dependantTypes);
        }

        return $this->_responseObj[$type];
    }
}
