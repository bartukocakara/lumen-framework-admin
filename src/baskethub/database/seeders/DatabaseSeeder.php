<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            // BrandSeeder::class,
            // BrandLinkSeeder::class,
            // BasketItemSeeder::class,
            // BasketExtraSeeder::class,
            // AdminCartSeeder::class,
            // CategorySeeder::class,
            // CitySeeder::class,
            // CommentSeeder::class,
            // ContinentSeeder::class,
            // CountrySeeder::class,
            // CouponAllowedEmailSeeder::class,
            // CurrencySeeder::class,
            // CurrencyFeeSeeder::class,
            // CustomizationSeeder::class,
            // CustomerAddressSeeder::class,
            // CustomerSavedCardSeeder::class,
            // CustomerSettingSeeder::class,
            // CustomerStockWarningSeeder::class,
            // CustomizationSeeder::class,
            // DepoCountSeeder::class,
            // DepoSeeder::class,
            DepoInfoSeeder::class,
            // DistrictSeeder::class,
            // DistrictTwoSeeder::class,
            // DistrictThreeSeeder::class,
            // CustomerSavedAddressSeeder::class,
            // EmailLogSeeder::class,
            // FaqSeeder::class,
            // FavoriteSeeder::class,
            // FeatureGroupSeeder::class,
            // FeatureSeeder::class,
            // CouponSeeder::class,
            // CouponUsageSeeder::class,
            // CouponBundleSeeder::class,
            // GeneralSettingSeeder::class,
            // GroupSeeder::class,
            // CustomerSeeder::class,
            // IyzicoPaymentItemSeeder::class,
            // IyzicoRefundSeeder::class,
            // IyzicoRequestSeeder::class,
            // LogoCategorySeeder::class,
            // MarketplaceRequestSeeder::class,
            // MenuSeeder::class,
            // PaymentLogSeeder::class,
            // PaymentCategorySeeder::class,
            // UrlRewriteSeeder::class,
            // ProductSeeder::class,
            // ProductCategorySeeder::class,
            // ProductCommentSeeder::class,
            // ProductCompletingSeeder::class,
            // ProductCostSeeder::class,
            // ProductFeatureSeeder::class,
            // ProductImageSeeder::class,
            // ProductInterestSeeder::class,
            // ProductLinkScoreSeeder::class,
            // ProductRelatedSeeder::class,
            // ProductSortSeeder::class,
            // ProductTempSeeder::class,
            // ProductTranslationSeeder::class,
            // UserSeeder::class,
            // PaymentTypeSeeder::class,
            // PurchaseOrderSeeder::class,
            // SaleAddressSeeder::class,
            // SaleItemComponentSeeder::class,
            // SaleItemSeeder::class,
            // SaleReserveSeeder::class,
            // SaleSeeder::class,
            // BillingSeeder::class,
            // SaleShipmentItemSeeder::class,
            // SaleShipmentSeeder::class,
            // SaleStatusSeeder::class,
            // SaleTrackSeeder::class,
            // ShipmentItemSeeder::class,
            // ShipmentSeeder::class,
            // ShippingTypeSeeder::class,
            // ShoppingCartSeeder::class,
            // SliderHitSeeder::class,
            // SliderSeeder::class,
            // SlowLinkSeeder::class,
            // SupplierSeeder::class,
            // SubMenuSeeder::class,
            // UrlRewriteProductOrderSeeder::class,
            // UserActionSeeder::class,
            // WishlistSeeder::class
        ]);
    }
}
