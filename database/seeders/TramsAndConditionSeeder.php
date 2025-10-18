<?php

namespace Database\Seeders;

use App\Models\TramsAndCondition;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TramsAndConditionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TramsAndCondition::insert([
            'content' => '<h3 style="margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px;"><p class="ds-markdown-paragraph" style="margin-right: 0px; margin-bottom: 16px; margin-left: 0px;">A Food Park Restaurants Trams and Conditions page, more accurately known as its "Terms and Conditions" (T&amp;Cs), is a critical legal document that forms the backbone of the relationship between the dining establishment and its customers. While often overlooked, this page is far more than just legal fine print; it is a comprehensive guide that outlines the rules, responsibilities, and rights of all parties involved in the food park experience. For a complex operation like a food park—which is essentially a curated collection of multiple independent vendors operating within a shared, often unique, space—a robust set of terms is essential for managing expectations and ensuring a smooth, safe, and enjoyable environment for everyone.</p><p class="ds-markdown-paragraph" style="margin: 16px 0px;">The primary function of the T&amp;Cs is to establish clear rules of conduct for guests. This section explicitly defines prohibited behaviors to maintain a safe and family-friendly atmosphere. It typically bans activities such as smoking outside designated areas, bringing in outside food and alcohol, causing disturbances, and engaging in any illegal conduct. It also outlines policies on pets, limiting them to service animals only, and establishes guidelines for childrens supervision. Furthermore, it addresses the use of the communal space, often restricting vendor solicitation and setting rules for photography or filming, especially for commercial purposes. By clearly stating these rules, the food park protects itself and its vendors from liability and ensures a consistent standard of behavior for all patrons.</p><p class="ds-markdown-paragraph" style="margin: 16px 0px;">Another crucial component addresses liability and risk allocation. This is particularly important in a bustling, high-traffic environment with multiple food preparation areas. The T&amp;Cs will include disclaimers stating that customers enter the premises at their own risk and that the food park and its vendors are not liable for lost, stolen, or damaged personal property. More significantly, it contains clauses related to food consumption. This includes standard allergy disclaimers, noting that while ingredient information is available, cross-contamination is possible in a shared kitchen environment, and customers with severe allergies must be vigilant. The terms also typically state that the food park is not responsible for any illness or injury resulting from food consumed from any of its vendors, placing the responsibility for food safety on the individual vendor operators.</p><p class="ds-markdown-paragraph" style="margin: 16px 0px;">Finally, the page covers transactional and operational policies. This includes the food parks stance on refunds and exchanges, which are often final once an order is placed due to the perishable nature of the goods. For food parks that offer reservations for seating areas or special events, the cancellation policy, deposit requirements, and no-show fees will be detailed here. It also clarifies intellectual property rights, asserting that the food parks name, logo, and overall branding are protected and cannot be used without permission.</p><p class="ds-markdown-paragraph" style="margin-top: 16px; margin-right: 0px; margin-left: 0px; margin-bottom: 0px !important;">In essence, the Food Park Restaurants Terms and Conditions page is a foundational document of consent. By entering the premises or making a purchase, a customer implicitly agrees to these rules. It serves as a protective shield for the business, a clear code of conduct for guests, and a framework that allows the diverse and vibrant ecosystem of a food park to operate harmoniously and successfully.</p></h3>',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
