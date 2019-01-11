<?php

namespace Chargebee\Chargebee\Models;

use Chargebee\Chargebee\Model;

class ChargeBee_SubscriptionReferralInfo extends Model
{
    protected $allowed = ['referral_code', 'coupon_code', 'referrer_id', 'external_reference_id', 'reward_status', 'referral_system', 'account_id', 'campaign_id', 'external_campaign_id', 'friend_offer_type', 'referrer_reward_type', 'notify_referral_system', 'destination_url', 'post_purchase_widget_enabled'];
}
