<?php
session_start();
?>
<?php
include("connect.php");
include("session.php");
include("admin/products/functions.php");


$products = get_products($connect);
?>

<?php include "header.php"; ?>
<div class="layout-content-container flex flex-col max-w-[960px] flex-1">
    <div class="@container">
        <div class="@[480px]:px-4 @[480px]:py-3">
            <div class="bg-cover bg-center flex flex-col justify-end overflow-hidden bg-white @[480px]:rounded-xl min-h-80"
                style='background-image: linear-gradient(0deg, rgba(0, 0, 0, 0.4) 0%, rgba(0, 0, 0, 0) 25%), url("https://lh3.googleusercontent.com/aida-public/AB6AXuBNAG8guRdkfLRNRWg1d-8S2OMY0j-0tb8Fb2ts7_zj04sHh2rMn1L2Xuk7MisWk7Jjx_6_RY68FoeGmBrNBTgacxnxUHGFpGqF3KOUT9Xkn0NA6p2HUw9yfZ1va-dSEamN1O-3xehkKOw1seEVl62p4uhk_J__XPg8gwxfwlonQx5MmokOIGF8uojIGxDExWAWyeg6UxXuYlF-WMhIiufEfmPI8dTNWLlObEa8sp_4Kp6tLWcEMqRiD6J3OBFMR3UjLi-cLVcfzWkF");'>
                <div class="flex justify-center gap-2 p-5">
                    <div class="size-1.5 rounded-full bg-white"></div>
                    <div class="size-1.5 rounded-full bg-white opacity-50"></div>
                    <div class="size-1.5 rounded-full bg-white opacity-50"></div>
                    <div class="size-1.5 rounded-full bg-white opacity-50"></div>
                    <div class="size-1.5 rounded-full bg-white opacity-50"></div>
                </div>
            </div>
        </div>
    </div>
    <h2 class="text-[#121416] text-[22px] font-bold leading-tight tracking-[-0.015em] px-4 pb-3 pt-5">New Arrivals</h2>

    <div
        class="flex overflow-y-auto [-ms-scrollbar-style:none] [scrollbar-width:none] [&amp;::-webkit-scrollbar]:hidden">
        <div class="flex items-stretch p-4 gap-3">
            <?php while ($product = mysqli_fetch_assoc($products)): ?>
            <div class="flex h-full flex-1 flex-col gap-4 rounded-lg min-w-60">
                <div class="w-full bg-center bg-no-repeat aspect-video bg-cover rounded-xl flex flex-col"
                    style='background-image: url("<?php echo $product['image']; ?>");'>
                </div>
                <div>
                    <p class="text-[#121416] text-base font-medium leading-normal"><?php echo $product['name']; ?></p>
                    <p class="text-[#6a7581] text-sm font-normal leading-normal">
                        <?php echo number_format($product['price'], 2); ?>
                    </p>
                    <p class="text-[#6a7581] text-sm font-normal leading-normal">
                        <?php echo $product['stock']; ?> in stock
                    </p>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
    </div>
    <h2 class="text-[#121416] text-[22px] font-bold leading-tight tracking-[-0.015em] px-4 pb-3 pt-5">Best Sellers</h2>
    <div
        class="flex overflow-y-auto [-ms-scrollbar-style:none] [scrollbar-width:none] [&amp;::-webkit-scrollbar]:hidden">
        <div class="flex items-stretch p-4 gap-3">
            <div class="flex h-full flex-1 flex-col gap-4 rounded-lg min-w-60">
                <div class="w-full bg-center bg-no-repeat aspect-video bg-cover rounded-xl flex flex-col"
                    style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuCvE2eqzwK5S1C3KdtLhFMTaovnD_etyHFq6z5lpogFICw6O6UOPbknLWmCreJPoL_FMI-uCiMatC6qFQGB1feEgX4CvN0tnVOzWh2AsuBs--zYRvVR5LT02XR_vyNps-Av863SgvH7_KDYNnEzS2KG9fbM9_d5FwXb1c4-KL76i9PoHhF4y46ssoWjJ_Nhj3jwxsIHDTrtx1AltFJf9QM8AgEj9nR4jSToBjDJTFMoapQ9naqDhyYTsmsPtYcANrivYlb4D-Td080v");'>
                </div>
                <div>
                    <p class="text-[#121416] text-base font-medium leading-normal">Top-Rated Fashion Items</p>
                    <p class="text-[#6a7581] text-sm font-normal leading-normal">Customer favorites in fashion</p>
                </div>
            </div>
            <div class="flex h-full flex-1 flex-col gap-4 rounded-lg min-w-60">
                <div class="w-full bg-center bg-no-repeat aspect-video bg-cover rounded-xl flex flex-col"
                    style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuAz4TXbIn3_PXDm26GTuw6OKSN2hYsOO0oooqS6tteEcjsV_dEI3bmoEnF6ZMOJf8t6kB9O9GSjlNwqqlCn44qeUdN5NFXZ0O1zV7oEdyk_ZDeOa4WAvgoXUqEBogDysm0rLZLKGbUG4ChSPwyhb6E6g17SIyWsUFWsz9GCkEe_xudaN1uLvJGftBR4Z9C4Kap2ZuwtFQgKUEC7JMy46mwntFRf8qBcyyTOegXzlfEFp8r-cW4vr94xBuAkc4g0pqF1udlqpG4Gg1tS");'>
                </div>
                <div>
                    <p class="text-[#121416] text-base font-medium leading-normal">Most Popular Electronics</p>
                    <p class="text-[#6a7581] text-sm font-normal leading-normal">Highly-rated tech products</p>
                </div>
            </div>
            <div class="flex h-full flex-1 flex-col gap-4 rounded-lg min-w-60">
                <div class="w-full bg-center bg-no-repeat aspect-video bg-cover rounded-xl flex flex-col"
                    style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuA6FLwAsPcNo-OEbf375jLlzdvpNkcc1GO4m_7jKSweH-j-UJzEwIz684JqCHROvlBl7hzi7cHicr-ekkTDnMZMuP4SIQg_EqxU1VC7gGTvrOwty2MVOEu9oKVao3zjopY33cOZnmat7A7SBk0fshOOZ8poGIWvUNOFbpKCOz6ZRjMjFFg-8onunIruBuRHux0mBMWr2GzlLhfY2-dtGwqQEcLSxBUnYFgJxNJXKMMMXQUcNersq904XLNe7Pl-MzrVR3QfHmoF_v28");'>
                </div>
                <div>
                    <p class="text-[#121416] text-base font-medium leading-normal">Best-Selling Home Goods</p>
                    <p class="text-[#6a7581] text-sm font-normal leading-normal">Top picks for home improvement</p>
                </div>
            </div>
        </div>
    </div>
    <h2 class="text-[#121416] text-[22px] font-bold leading-tight tracking-[-0.015em] px-4 pb-3 pt-5">Deals of the Day
    </h2>
    <div
        class="flex overflow-y-auto [-ms-scrollbar-style:none] [scrollbar-width:none] [&amp;::-webkit-scrollbar]:hidden">
        <div class="flex items-stretch p-4 gap-3">
            <div class="flex h-full flex-1 flex-col gap-4 rounded-lg min-w-60">
                <div class="w-full bg-center bg-no-repeat aspect-video bg-cover rounded-xl flex flex-col"
                    style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuA2IdgAhtngI4TY0z0oBmr23AjPZboVdM3l8R10T1R7bVPa_sKGpabMZTp4fhYN0bXb6an_Qngkw2dLc9U7jXwDXUFP8vwmEM3Sg-NyGhFblur0c1bhPkhza1s3CC2cwniXhZEB6mwA8yuo_ul3Kdee6_UEbiDRbU-2c_tvcCqwqm_KNJIFh4QOhSmkK7Myvwi3BpFSH3-c5SBRaEo1LsiguXhGvSOSKp7ZXPr7EIDCzskd-HBoQA1pZytdbJJv9pZBX_vxGe4H7v2O");'>
                </div>
                <div>
                    <p class="text-[#121416] text-base font-medium leading-normal">Limited-Time Fashion Deals</p>
                    <p class="text-[#6a7581] text-sm font-normal leading-normal">Unbeatable prices on fashion items</p>
                </div>
            </div>
            <div class="flex h-full flex-1 flex-col gap-4 rounded-lg min-w-60">
                <div class="w-full bg-center bg-no-repeat aspect-video bg-cover rounded-xl flex flex-col"
                    style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuCMT1qJhZDxvzKXX3I4YbMJAvq8TK6REW4tSnIoqERec47XOJfyKK4pcKmgEQyctfON_ldA4e5NzpEOVaCHCSRxa7dzX6T7NCukhie3lT6UkF9p2oSuuj8CS_hx1ir4FYhLKhuK0noZPvcBbKAdqRXL0wC7yLYhIofXf6Vofrx-097a-7ZJjdapOKfG9y7tJAM5AFGWSsxK4WIYxVeLrBXz4dsEf5YNuyUwk5_2kduF7CAWFild70GhMo5Q3xr_--wwq1HErykjRIwm");'>
                </div>
                <div>
                    <p class="text-[#121416] text-base font-medium leading-normal">Today's Top Tech Discounts</p>
                    <p class="text-[#6a7581] text-sm font-normal leading-normal">Save big on the latest electronics</p>
                </div>
            </div>
            <div class="flex h-full flex-1 flex-col gap-4 rounded-lg min-w-60">
                <div class="w-full bg-center bg-no-repeat aspect-video bg-cover rounded-xl flex flex-col"
                    style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuDe6v_NlB6dVKqExnl6SppJWWivRdtmOq7Rvvr6Gut8BvLfw2YXxblNleZqNMqeXFFJIHsLA5uwOPFtZFac6Lc3Wf8VTbFy93y0Z43NgwDZlkGrRWlf3m1PAvaT1LPd0Esqr_sLY1VI21Z6YmlpSNgRMBN8cla6_5d6xYxTHYr4Q7lcBNPj1IGd94MDoGDU9aV0tOkGfm_nszqcbZBxG-M3JsGo7KbzNe87Tj8MhhzijkOhr69P1yxG9MOpI2GL92tX-SPjozx9GzDO");'>
                </div>
                <div>
                    <p class="text-[#121416] text-base font-medium leading-normal">Exclusive Home Offers</p>
                    <p class="text-[#6a7581] text-sm font-normal leading-normal">Special deals for your home</p>
                </div>
            </div>
        </div>
    </div>
    <h2 class="text-[#121416] text-[22px] font-bold leading-tight tracking-[-0.015em] px-4 pb-3 pt-5">Customer Favorites
    </h2>
    <div
        class="flex overflow-y-auto [-ms-scrollbar-style:none] [scrollbar-width:none] [&amp;::-webkit-scrollbar]:hidden">
        <div class="flex items-stretch p-4 gap-3">
            <div class="flex h-full flex-1 flex-col gap-4 rounded-lg min-w-60">
                <div class="w-full bg-center bg-no-repeat aspect-video bg-cover rounded-xl flex flex-col"
                    style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuA0g46ZyeP47SlPZv0obMeS3iSYt16LQQDrC_n1BvScULEwo_4uncecRxtbBHOOyAYSzaNFDR1gMGipr8SgvoJEfjo2xSvGRm9N5Bwj19cCSFlK2vWdP55xG2Hj-KDANUrSMqc3PX_e959F-jgrQkDmj-RQqaCXB-8-i-BC9HkUe3HB5mVzmN3hSvMs2P6nOvfGKo1Hbbpi36V-rIy3CNf7mUDf3jWOjrQIiz-IWod8f2TvEJwHGld_avS2KqIQ8V4pl5YxTrP0q9I8");'>
                </div>
                <div>
                    <p class="text-[#121416] text-base font-medium leading-normal">Most Loved Fashion Picks</p>
                    <p class="text-[#6a7581] text-sm font-normal leading-normal">Fashion items customers adore</p>
                </div>
            </div>
            <div class="flex h-full flex-1 flex-col gap-4 rounded-lg min-w-60">
                <div class="w-full bg-center bg-no-repeat aspect-video bg-cover rounded-xl flex flex-col"
                    style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuBAK_BKwJ8eRIFRB-9KZvK7qtRclFUjJigzTQUUM5HhTFCaRR-cuSNnOVFxykYfrI6Wm6jp-wdtzYBMqUEvREq97b1i-pE4p7b713XaLSh4_etMxRptIet4PExHYhoSesCAbHr87y-tYGjtNFEgGyltpKVPwdzW9ripg6r93ASRWg3kqY7Aq_CItU102v_NLvmq0tk7DZRpHG8jPfCgbRDI9gwUVs7vawjRKfFnyYoY1injVC9SfHoOGU8z2NYqa_ACNG_M7dDQigQ2");'>
                </div>
                <div>
                    <p class="text-[#121416] text-base font-medium leading-normal">Customer's Choice Electronics</p>
                    <p class="text-[#6a7581] text-sm font-normal leading-normal">Top-rated electronics by users</p>
                </div>
            </div>
            <div class="flex h-full flex-1 flex-col gap-4 rounded-lg min-w-60">
                <div class="w-full bg-center bg-no-repeat aspect-video bg-cover rounded-xl flex flex-col"
                    style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuDg4N0__Nw8dRtiFDshz_2K46h3FRY4uBGpomf_mRMMfsLqtW5p4hvVxpzUwAIxHRTL1W1zslUujRdbW-r1UoJvTFWWaLnYxzU3oo3Ki7cpViKKK6mgrp11hhyObud8BDHb6oRlZ9DtSkhy8TyygPvR7Awbru32Igsxq28K_rceF7q6_exfJNFNzvLzkK0xvfPnMiE4tZXGSo_8hq8n66JPL8LOTw-x1l_zdx5A1XUu-WL-Kx3-bbGXnoDYTliJmtru_8jmWP6Y6ZCg");'>
                </div>
                <div>
                    <p class="text-[#121416] text-base font-medium leading-normal">Favorite Home Decor Items</p>
                    <p class="text-[#6a7581] text-sm font-normal leading-normal">Home decor items everyone loves</p>
                </div>
            </div>
        </div>
    </div>
    <h2 class="text-[#121416] text-[22px] font-bold leading-tight tracking-[-0.015em] px-4 pb-3 pt-5">Featured Items
    </h2>
    <div class="grid grid-cols-[repeat(auto-fit,minmax(158px,1fr))] gap-3 p-4">
        <div class="flex flex-col gap-3 pb-3">
            <div class="w-full bg-center bg-no-repeat aspect-video bg-cover rounded-xl"
                style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuDyisyewN39AX0bfZ8DjjHIusmgCfgUiA96gIjySODqfktJdvtsgAPzdb1h11z_guo4kV7BWSVbcfAcXXRRzn8W79J3rsV014qhhqtOw6_pe9ilZKC-EqoTfNbN_7YegkvGOlh04gNujK5Te49b3t9tL1OpTzIwbP0I6wJn1qt7QxlC2Zsk2sa3bv0Q_GBAtisDW8fjWL4dSRs3elKE_10nTozk9OSEByVpPHFwaDPxcnWEccPfe1h6WTB0ASxkudvoCV1JmiiT13ha");'>
            </div>
            <div>
                <p class="text-[#121416] text-base font-medium leading-normal">Premium Leather Handbag</p>
                <p class="text-[#6a7581] text-sm font-normal leading-normal">Luxurious and durable handbag</p>
            </div>
        </div>
        <div class="flex flex-col gap-3 pb-3">
            <div class="w-full bg-center bg-no-repeat aspect-video bg-cover rounded-xl"
                style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuAopOtv6ajVmI_QYG7Nkm8TIE9EZ211mzg88wutdSrP-8gzD_gFRPKgUCHnWOBoPVhhrvSsits9SPD-KkZF4GAb2c1-ccGAFQu06e59x6_pVrnSY0A7uL-NmBYvdmrhn85G4-rMcl8Dx8XzQezPhIpZb31qgIDvSmDyExLIVlO0dsS_7qJSMKkQ_Wbbnfww007e6wlare0-ZKcG1621ZbnJjfZ2gVWUYMxyr94kVmCrjE47p7C4ZzTqYwWsmBKa3ezrcoaePb9Vhk-e");'>
            </div>
            <div>
                <p class="text-[#121416] text-base font-medium leading-normal">Wireless Noise-Canceling Headphones</p>
                <p class="text-[#6a7581] text-sm font-normal leading-normal">Immersive audio experience</p>
            </div>
        </div>
        <div class="flex flex-col gap-3 pb-3">
            <div class="w-full bg-center bg-no-repeat aspect-video bg-cover rounded-xl"
                style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuA7NQLPGGAXv6viGI6BSc-1lVRHdpQcRI6mBwD3UlfaF7q_EkzBh5R1Y-1tHrO5hvXBY136y4ut-mOTk6ieCnMsFggh5lR-oEOtxIZFjUgfdNb4UZJRDwZ500S17hRtPbbMMzGrKaKbaAa4bss9NQycZCCrJozLebTxaWeI-BhQDLVcDV_7l4B7bHP2396opQ9rclcR5SFskGkHeUuCuFWGXUNVjgVMrFPWJhYqIYieXyZ0rDsD4LVn0Tav6mVrFQ0u90Vko8hbtecc");'>
            </div>
            <div>
                <p class="text-[#121416] text-base font-medium leading-normal">Modern Minimalist Desk Lamp</p>
                <p class="text-[#6a7581] text-sm font-normal leading-normal">Sleek design for your workspace</p>
            </div>
        </div>
        <div class="flex flex-col gap-3 pb-3">
            <div class="w-full bg-center bg-no-repeat aspect-video bg-cover rounded-xl"
                style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuATSgNrAOqIfiZMWTBXKB-9LzM4Wx89ObI1xNTfn5uUmpkP55f7a2m-DPzhT5tNQ1jNVVeVn6xkP-_NQxtDoCAuD4RLa11Tlv1DgrJ7fylL6ssg16fCi5epKAYTVaDzOci7EPey29YtzdFdfNBAANqClbHS-Z9HdPF2X74QMRmKmHkzsBhgy9Wb4GbtkvLhw8f38ixGIHzmd4hiMjgBxjQyCXNeHmnXLgyQ3utNBrPVjcObBZv-C8YOLuJsdfMX-1YmeEcyotx-bjz6");'>
            </div>
            <div>
                <p class="text-[#121416] text-base font-medium leading-normal">Organic Cotton Bedding Set</p>
                <p class="text-[#6a7581] text-sm font-normal leading-normal">Soft and eco-friendly bedding</p>
            </div>
        </div>
        <div class="flex flex-col gap-3 pb-3">
            <div class="w-full bg-center bg-no-repeat aspect-video bg-cover rounded-xl"
                style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuBGZ1hpqs_VBb1itU2ortStwEvIIpFYINx1u7B0UG2IrnI_wQpx7PX2ygWmyC___cFHAHOiqnxTWgwknQKqAlpWwQuGFO3qFfikMTqXpf8p-Rc8Xm1_rvV63WJxTH6xFheuvAVgsY84PAtjjVG0PJUsQJljt4il4fyJkhp1A5d94sVJ91Dg97Bahym-xUewS6Daqbt2gb7yYZlK0vngM_cicuhXE2_R7gfzHB8lRJgEySYmHpd-X90gGmaP5tm-Mld1qVNRJrHJfl5l");'>
            </div>
            <div>
                <p class="text-[#121416] text-base font-medium leading-normal">Smart Fitness Tracker Watch</p>
                <p class="text-[#6a7581] text-sm font-normal leading-normal">Track your health and activity</p>
            </div>
        </div>
        <div class="flex flex-col gap-3 pb-3">
            <div class="w-full bg-center bg-no-repeat aspect-video bg-cover rounded-xl"
                style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuB9c2PPc87dsUfQ59LA98yKXTBK8w7Oro6LNYeY8woUJinw6Ny1afSXLxyvKlKjqgx09PpnglpCdBJ5ZLWj30_8wZEnNi1X70X_Oy82_KTMdJ9ESxkj29phawZFjj1L8nsv3ORcfeTSrP70PXXXIP35PTnt77saMyar6b71iLH8IH_FeohWASJwDONEIAikYuD0A4MsvwtPojB8OFf9eqcCD25QB7SW67Rqj4URnYXmWPeuSgfNWxIDvI6C1PvQbdHuE4JNC1It55Pl");'>
            </div>
            <div>
                <p class="text-[#121416] text-base font-medium leading-normal">Artisan Crafted Coffee Mugs</p>
                <p class="text-[#6a7581] text-sm font-normal leading-normal">Unique and stylish mugs</p>
            </div>
        </div>
    </div>
</div>
</div>
<?php include "footer.php"; ?>