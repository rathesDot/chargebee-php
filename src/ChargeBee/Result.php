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
            'ChargeBee_Subscription',
        ['addons' => 'ChargeBee_SubscriptionAddon', 'event_based_addons' => 'ChargeBee_SubscriptionEventBasedAddon', 'charged_event_based_addons' => 'ChargeBee_SubscriptionChargedEventBasedAddon', 'coupons' => 'ChargeBee_SubscriptionCoupon', 'shipping_address' => 'ChargeBee_SubscriptionShippingAddress', 'referral_info' => 'ChargeBee_SubscriptionReferralInfo']
        );
    }

    public function customer()
    {
        return $this->_get(
            'customer',
            'ChargeBee_Customer',
        ['billing_address' => 'ChargeBee_CustomerBillingAddress', 'referral_urls' => 'ChargeBee_CustomerReferralUrl', 'contacts' => 'ChargeBee_CustomerContact', 'payment_method' => 'ChargeBee_CustomerPaymentMethod', 'balances' => 'ChargeBee_CustomerBalance']
        );
    }

    public function contact()
    {
        return $this->_get('contact', 'ChargeBee_Contact');
    }

    public function paymentSource()
    {
        return $this->_get(
            'payment_source',
            'ChargeBee_PaymentSource',
        ['card' => 'ChargeBee_PaymentSourceCard', 'bank_account' => 'ChargeBee_PaymentSourceBankAccount', 'amazon_payment' => 'ChargeBee_PaymentSourceAmazonPayment', 'paypal' => 'ChargeBee_PaymentSourcePaypal']
        );
    }

    public function thirdPartyPaymentMethod()
    {
        return $this->_get('third_party_payment_method', 'ChargeBee_ThirdPartyPaymentMethod');
    }

    public function virtualBankAccount()
    {
        return $this->_get('virtual_bank_account', 'ChargeBee_VirtualBankAccount');
    }

    public function card()
    {
        return $this->_get('card', 'ChargeBee_Card');
    }

    public function promotionalCredit()
    {
        return $this->_get('promotional_credit', 'ChargeBee_PromotionalCredit');
    }

    public function invoice()
    {
        return $this->_get(
            'invoice',
            'ChargeBee_Invoice',
        ['line_items' => 'ChargeBee_InvoiceLineItem', 'discounts' => 'ChargeBee_InvoiceDiscount', 'line_item_discounts' => 'ChargeBee_InvoiceLineItemDiscount', 'taxes' => 'ChargeBee_InvoiceTax', 'line_item_taxes' => 'ChargeBee_InvoiceLineItemTax', 'line_item_tiers' => 'ChargeBee_InvoiceLineItemTier', 'linked_payments' => 'ChargeBee_InvoiceLinkedPayment', 'applied_credits' => 'ChargeBee_InvoiceAppliedCredit', 'adjustment_credit_notes' => 'ChargeBee_InvoiceAdjustmentCreditNote', 'issued_credit_notes' => 'ChargeBee_InvoiceIssuedCreditNote', 'linked_orders' => 'ChargeBee_InvoiceLinkedOrder', 'notes' => 'ChargeBee_InvoiceNote', 'shipping_address' => 'ChargeBee_InvoiceShippingAddress', 'billing_address' => 'ChargeBee_InvoiceBillingAddress']
        );
    }

    public function creditNote()
    {
        return $this->_get(
            'credit_note',
            'ChargeBee_CreditNote',
        ['line_items' => 'ChargeBee_CreditNoteLineItem', 'discounts' => 'ChargeBee_CreditNoteDiscount', 'line_item_discounts' => 'ChargeBee_CreditNoteLineItemDiscount', 'line_item_tiers' => 'ChargeBee_CreditNoteLineItemTier', 'taxes' => 'ChargeBee_CreditNoteTax', 'line_item_taxes' => 'ChargeBee_CreditNoteLineItemTax', 'linked_refunds' => 'ChargeBee_CreditNoteLinkedRefund', 'allocations' => 'ChargeBee_CreditNoteAllocation']
        );
    }

    public function unbilledCharge()
    {
        return $this->_get(
            'unbilled_charge',
            'ChargeBee_UnbilledCharge',
        ['tiers' => 'ChargeBee_UnbilledChargeTier']
        );
    }

    public function order()
    {
        return $this->_get(
            'order',
            'ChargeBee_Order',
        ['order_line_items' => 'ChargeBee_OrderOrderLineItem', 'shipping_address' => 'ChargeBee_OrderShippingAddress', 'billing_address' => 'ChargeBee_OrderBillingAddress', 'line_item_taxes' => 'ChargeBee_OrderLineItemTax', 'line_item_discounts' => 'ChargeBee_OrderLineItemDiscount', 'linked_credit_notes' => 'ChargeBee_OrderLinkedCreditNote']
        );
    }

    public function gift()
    {
        return $this->_get(
            'gift',
            'ChargeBee_Gift',
        ['gifter' => 'ChargeBee_GiftGifter', 'gift_receiver' => 'ChargeBee_GiftGiftReceiver', 'gift_timelines' => 'ChargeBee_GiftGiftTimeline']
        );
    }

    public function transaction()
    {
        return $this->_get(
            'transaction',
            'ChargeBee_Transaction',
        ['linked_invoices' => 'ChargeBee_TransactionLinkedInvoice', 'linked_credit_notes' => 'ChargeBee_TransactionLinkedCreditNote', 'linked_refunds' => 'ChargeBee_TransactionLinkedRefund', 'linked_payments' => 'ChargeBee_TransactionLinkedPayment']
        );
    }

    public function hostedPage()
    {
        return $this->_get('hosted_page', 'ChargeBee_HostedPage');
    }

    public function estimate()
    {
        $estimate = $this->_get(
            'estimate',
            'ChargeBee_Estimate',
            [],
        ['subscription_estimate' => 'ChargeBee_SubscriptionEstimate', 'invoice_estimate' => 'ChargeBee_InvoiceEstimate', 'invoice_estimates' => 'ChargeBee_InvoiceEstimate', 'next_invoice_estimate' => 'ChargeBee_InvoiceEstimate', 'credit_note_estimates' => 'ChargeBee_CreditNoteEstimate', 'unbilled_charge_estimates' => 'ChargeBee_UnbilledCharge']
        );
        $estimate->_initDependant(
            $this->_response['estimate'],
            'subscription_estimate',
        ['shipping_address' => 'ChargeBee_SubscriptionEstimateShippingAddress']
        );
        $estimate->_initDependant(
            $this->_response['estimate'],
            'invoice_estimate',
        ['line_items' => 'ChargeBee_InvoiceEstimateLineItem', 'discounts' => 'ChargeBee_InvoiceEstimateDiscount', 'taxes' => 'ChargeBee_InvoiceEstimateTax', 'line_item_taxes' => 'ChargeBee_InvoiceEstimateLineItemTax', 'line_item_tiers' => 'ChargeBee_InvoiceEstimateLineItemTier', 'line_item_discounts' => 'ChargeBee_InvoiceEstimateLineItemDiscount']
        );
        $estimate->_initDependant(
            $this->_response['estimate'],
            'next_invoice_estimate',
        ['line_items' => 'ChargeBee_InvoiceEstimateLineItem', 'discounts' => 'ChargeBee_InvoiceEstimateDiscount', 'taxes' => 'ChargeBee_InvoiceEstimateTax', 'line_item_taxes' => 'ChargeBee_InvoiceEstimateLineItemTax', 'line_item_tiers' => 'ChargeBee_InvoiceEstimateLineItemTier', 'line_item_discounts' => 'ChargeBee_InvoiceEstimateLineItemDiscount']
        );
        $estimate->_initDependantList(
            $this->_response['estimate'],
            'invoice_estimates',
        ['line_items' => 'ChargeBee_InvoiceEstimateLineItem', 'discounts' => 'ChargeBee_InvoiceEstimateDiscount', 'taxes' => 'ChargeBee_InvoiceEstimateTax', 'line_item_taxes' => 'ChargeBee_InvoiceEstimateLineItemTax', 'line_item_tiers' => 'ChargeBee_InvoiceEstimateLineItemTier', 'line_item_discounts' => 'ChargeBee_InvoiceEstimateLineItemDiscount']
        );
        $estimate->_initDependantList(
            $this->_response['estimate'],
            'credit_note_estimates',
        ['line_items' => 'ChargeBee_CreditNoteEstimateLineItem', 'discounts' => 'ChargeBee_CreditNoteEstimateDiscount', 'taxes' => 'ChargeBee_CreditNoteEstimateTax', 'line_item_taxes' => 'ChargeBee_CreditNoteEstimateLineItemTax', 'line_item_discounts' => 'ChargeBee_CreditNoteEstimateLineItemDiscount', 'line_item_tiers' => 'ChargeBee_CreditNoteEstimateLineItemTier']
        );
        $estimate->_initDependantList(
            $this->_response['estimate'],
            'unbilled_charge_estimates',
        ['tiers' => 'ChargeBee_UnbilledChargeTier']
        );

        return $estimate;
    }

    public function quote()
    {
        return $this->_get(
            'quote',
            'ChargeBee_Quote',
        ['line_items' => 'ChargeBee_QuoteLineItem', 'discounts' => 'ChargeBee_QuoteDiscount', 'line_item_discounts' => 'ChargeBee_QuoteLineItemDiscount', 'taxes' => 'ChargeBee_QuoteTax', 'line_item_taxes' => 'ChargeBee_QuoteLineItemTax', 'shipping_address' => 'ChargeBee_QuoteShippingAddress', 'billing_address' => 'ChargeBee_QuoteBillingAddress']
        );
    }

    public function plan()
    {
        return $this->_get(
            'plan',
            'ChargeBee_Plan',
        ['tiers' => 'ChargeBee_PlanTier', 'applicable_addons' => 'ChargeBee_PlanApplicableAddon', 'attached_addons' => 'ChargeBee_PlanAttachedAddon', 'event_based_addons' => 'ChargeBee_PlanEventBasedAddon']
        );
    }

    public function addon()
    {
        return $this->_get(
            'addon',
            'ChargeBee_Addon',
        ['tiers' => 'ChargeBee_AddonTier']
        );
    }

    public function coupon()
    {
        return $this->_get('coupon', 'ChargeBee_Coupon');
    }

    public function couponSet()
    {
        return $this->_get('coupon_set', 'ChargeBee_CouponSet');
    }

    public function couponCode()
    {
        return $this->_get('coupon_code', 'ChargeBee_CouponCode');
    }

    public function address()
    {
        return $this->_get('address', 'ChargeBee_Address');
    }

    public function event()
    {
        return $this->_get(
            'event',
            'ChargeBee_Event',
        ['webhooks' => 'ChargeBee_EventWebhook']
        );
    }

    public function comment()
    {
        return $this->_get('comment', 'ChargeBee_Comment');
    }

    public function download()
    {
        return $this->_get('download', 'ChargeBee_Download');
    }

    public function portalSession()
    {
        return $this->_get(
            'portal_session',
            'ChargeBee_PortalSession',
        ['linked_customers' => 'ChargeBee_PortalSessionLinkedCustomer']
        );
    }

    public function siteMigrationDetail()
    {
        return $this->_get('site_migration_detail', 'ChargeBee_SiteMigrationDetail');
    }

    public function resourceMigration()
    {
        return $this->_get('resource_migration', 'ChargeBee_ResourceMigration');
    }

    public function timeMachine()
    {
        return $this->_get('time_machine', 'ChargeBee_TimeMachine');
    }

    public function export()
    {
        return $this->_get(
            'export',
            'ChargeBee_Export',
        ['download' => 'ChargeBee_ExportDownload']
        );
    }

    public function unbilledCharges()
    {
        return $this->_getList(
            'unbilled_charges',
            'ChargeBee_UnbilledCharge',
        ['tiers' => 'ChargeBee_UnbilledChargeTier']
        );
    }

    public function creditNotes()
    {
        return $this->_getList(
            'credit_notes',
            'ChargeBee_CreditNote',
        ['line_items' => 'ChargeBee_CreditNoteLineItem', 'discounts' => 'ChargeBee_CreditNoteDiscount', 'line_item_discounts' => 'ChargeBee_CreditNoteLineItemDiscount', 'line_item_tiers' => 'ChargeBee_CreditNoteLineItemTier', 'taxes' => 'ChargeBee_CreditNoteTax', 'line_item_taxes' => 'ChargeBee_CreditNoteLineItemTax', 'linked_refunds' => 'ChargeBee_CreditNoteLinkedRefund', 'allocations' => 'ChargeBee_CreditNoteAllocation']
        );
    }

    public function invoices()
    {
        return $this->_getList(
            'invoices',
            'ChargeBee_Invoice',
        ['line_items' => 'ChargeBee_InvoiceLineItem', 'discounts' => 'ChargeBee_InvoiceDiscount', 'line_item_discounts' => 'ChargeBee_InvoiceLineItemDiscount', 'taxes' => 'ChargeBee_InvoiceTax', 'line_item_taxes' => 'ChargeBee_InvoiceLineItemTax', 'line_item_tiers' => 'ChargeBee_InvoiceLineItemTier', 'linked_payments' => 'ChargeBee_InvoiceLinkedPayment', 'applied_credits' => 'ChargeBee_InvoiceAppliedCredit', 'adjustment_credit_notes' => 'ChargeBee_InvoiceAdjustmentCreditNote', 'issued_credit_notes' => 'ChargeBee_InvoiceIssuedCreditNote', 'linked_orders' => 'ChargeBee_InvoiceLinkedOrder', 'notes' => 'ChargeBee_InvoiceNote', 'shipping_address' => 'ChargeBee_InvoiceShippingAddress', 'billing_address' => 'ChargeBee_InvoiceBillingAddress']
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
