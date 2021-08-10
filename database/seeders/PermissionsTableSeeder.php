<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'product_management_access',
            ],
            [
                'id'    => 18,
                'title' => 'product_category_create',
            ],
            [
                'id'    => 19,
                'title' => 'product_category_edit',
            ],
            [
                'id'    => 20,
                'title' => 'product_category_show',
            ],
            [
                'id'    => 21,
                'title' => 'product_category_delete',
            ],
            [
                'id'    => 22,
                'title' => 'product_category_access',
            ],
            [
                'id'    => 23,
                'title' => 'product_tag_create',
            ],
            [
                'id'    => 24,
                'title' => 'product_tag_edit',
            ],
            [
                'id'    => 25,
                'title' => 'product_tag_show',
            ],
            [
                'id'    => 26,
                'title' => 'product_tag_delete',
            ],
            [
                'id'    => 27,
                'title' => 'product_tag_access',
            ],
            [
                'id'    => 28,
                'title' => 'product_create',
            ],
            [
                'id'    => 29,
                'title' => 'product_edit',
            ],
            [
                'id'    => 30,
                'title' => 'product_show',
            ],
            [
                'id'    => 31,
                'title' => 'product_delete',
            ],
            [
                'id'    => 32,
                'title' => 'product_access',
            ],
            [
                'id'    => 33,
                'title' => 'rangement_create',
            ],
            [
                'id'    => 34,
                'title' => 'rangement_edit',
            ],
            [
                'id'    => 35,
                'title' => 'rangement_show',
            ],
            [
                'id'    => 36,
                'title' => 'rangement_delete',
            ],
            [
                'id'    => 37,
                'title' => 'rangement_access',
            ],
            [
                'id'    => 38,
                'title' => 'demande_create',
            ],
            [
                'id'    => 39,
                'title' => 'demande_edit',
            ],
            [
                'id'    => 40,
                'title' => 'demande_show',
            ],
            [
                'id'    => 41,
                'title' => 'demande_delete',
            ],
            [
                'id'    => 42,
                'title' => 'demande_access',
            ],
            [
                'id'    => 43,
                'title' => 'commande_create',
            ],
            [
                'id'    => 44,
                'title' => 'commande_edit',
            ],
            [
                'id'    => 45,
                'title' => 'commande_show',
            ],
            [
                'id'    => 46,
                'title' => 'commande_delete',
            ],
            [
                'id'    => 47,
                'title' => 'commande_access',
            ],
            [
                'id'    => 48,
                'title' => 'team_create',
            ],
            [
                'id'    => 49,
                'title' => 'team_edit',
            ],
            [
                'id'    => 50,
                'title' => 'team_show',
            ],
            [
                'id'    => 51,
                'title' => 'team_delete',
            ],
            [
                'id'    => 52,
                'title' => 'team_access',
            ],
            [
                'id'    => 53,
                'title' => 'user_alert_create',
            ],
            [
                'id'    => 54,
                'title' => 'user_alert_show',
            ],
            [
                'id'    => 55,
                'title' => 'user_alert_delete',
            ],
            [
                'id'    => 56,
                'title' => 'user_alert_access',
            ],
            [
                'id'    => 57,
                'title' => 'audit_log_show',
            ],
            [
                'id'    => 58,
                'title' => 'audit_log_access',
            ],
            [
                'id'    => 59,
                'title' => 'contact_management_access',
            ],
            [
                'id'    => 60,
                'title' => 'contact_company_create',
            ],
            [
                'id'    => 61,
                'title' => 'contact_company_edit',
            ],
            [
                'id'    => 62,
                'title' => 'contact_company_show',
            ],
            [
                'id'    => 63,
                'title' => 'contact_company_delete',
            ],
            [
                'id'    => 64,
                'title' => 'contact_company_access',
            ],
            [
                'id'    => 65,
                'title' => 'contact_contact_create',
            ],
            [
                'id'    => 66,
                'title' => 'contact_contact_edit',
            ],
            [
                'id'    => 67,
                'title' => 'contact_contact_show',
            ],
            [
                'id'    => 68,
                'title' => 'contact_contact_delete',
            ],
            [
                'id'    => 69,
                'title' => 'contact_contact_access',
            ],
            [
                'id'    => 70,
                'title' => 'faq_management_access',
            ],
            [
                'id'    => 71,
                'title' => 'faq_category_create',
            ],
            [
                'id'    => 72,
                'title' => 'faq_category_edit',
            ],
            [
                'id'    => 73,
                'title' => 'faq_category_show',
            ],
            [
                'id'    => 74,
                'title' => 'faq_category_delete',
            ],
            [
                'id'    => 75,
                'title' => 'faq_category_access',
            ],
            [
                'id'    => 76,
                'title' => 'faq_question_create',
            ],
            [
                'id'    => 77,
                'title' => 'faq_question_edit',
            ],
            [
                'id'    => 78,
                'title' => 'faq_question_show',
            ],
            [
                'id'    => 79,
                'title' => 'faq_question_delete',
            ],
            [
                'id'    => 80,
                'title' => 'faq_question_access',
            ],
            [
                'id'    => 81,
                'title' => 'tva_create',
            ],
            [
                'id'    => 82,
                'title' => 'tva_edit',
            ],
            [
                'id'    => 83,
                'title' => 'tva_show',
            ],
            [
                'id'    => 84,
                'title' => 'tva_delete',
            ],
            [
                'id'    => 85,
                'title' => 'tva_access',
            ],
            [
                'id'    => 86,
                'title' => 'liste_commande_create',
            ],
            [
                'id'    => 87,
                'title' => 'liste_commande_edit',
            ],
            [
                'id'    => 88,
                'title' => 'liste_commande_show',
            ],
            [
                'id'    => 89,
                'title' => 'liste_commande_delete',
            ],
            [
                'id'    => 90,
                'title' => 'liste_commande_access',
            ],
            [
                'id'    => 91,
                'title' => 'demande_prix_create',
            ],
            [
                'id'    => 92,
                'title' => 'demande_prix_edit',
            ],
            [
                'id'    => 93,
                'title' => 'demande_prix_show',
            ],
            [
                'id'    => 94,
                'title' => 'demande_prix_delete',
            ],
            [
                'id'    => 95,
                'title' => 'demande_prix_access',
            ],
            [
                'id'    => 96,
                'title' => 'demande_achat_create',
            ],
            [
                'id'    => 97,
                'title' => 'demande_achat_edit',
            ],
            [
                'id'    => 98,
                'title' => 'demande_achat_show',
            ],
            [
                'id'    => 99,
                'title' => 'demande_achat_delete',
            ],
            [
                'id'    => 100,
                'title' => 'demande_achat_access',
            ],
            [
                'id'    => 101,
                'title' => 'basic_c_r_m_access',
            ],
            [
                'id'    => 102,
                'title' => 'crm_status_create',
            ],
            [
                'id'    => 103,
                'title' => 'crm_status_edit',
            ],
            [
                'id'    => 104,
                'title' => 'crm_status_show',
            ],
            [
                'id'    => 105,
                'title' => 'crm_status_delete',
            ],
            [
                'id'    => 106,
                'title' => 'crm_status_access',
            ],
            [
                'id'    => 107,
                'title' => 'crm_customer_create',
            ],
            [
                'id'    => 108,
                'title' => 'crm_customer_edit',
            ],
            [
                'id'    => 109,
                'title' => 'crm_customer_show',
            ],
            [
                'id'    => 110,
                'title' => 'crm_customer_delete',
            ],
            [
                'id'    => 111,
                'title' => 'crm_customer_access',
            ],
            [
                'id'    => 112,
                'title' => 'crm_note_create',
            ],
            [
                'id'    => 113,
                'title' => 'crm_note_edit',
            ],
            [
                'id'    => 114,
                'title' => 'crm_note_show',
            ],
            [
                'id'    => 115,
                'title' => 'crm_note_delete',
            ],
            [
                'id'    => 116,
                'title' => 'crm_note_access',
            ],
            [
                'id'    => 117,
                'title' => 'crm_document_create',
            ],
            [
                'id'    => 118,
                'title' => 'crm_document_edit',
            ],
            [
                'id'    => 119,
                'title' => 'crm_document_show',
            ],
            [
                'id'    => 120,
                'title' => 'crm_document_delete',
            ],
            [
                'id'    => 121,
                'title' => 'crm_document_access',
            ],
            [
                'id'    => 122,
                'title' => 'ligne_demande_show',
            ],
            [
                'id'    => 123,
                'title' => 'ligne_demande_access',
            ],
            [
                'id'    => 124,
                'title' => 'validation_achat_create',
            ],
            [
                'id'    => 125,
                'title' => 'validation_achat_edit',
            ],
            [
                'id'    => 126,
                'title' => 'validation_achat_show',
            ],
            [
                'id'    => 127,
                'title' => 'validation_achat_delete',
            ],
            [
                'id'    => 128,
                'title' => 'validation_achat_access',
            ],
            [
                'id'    => 129,
                'title' => 'achat_management_access',
            ],
            [
                'id'    => 130,
                'title' => 'demande_stock_management_access',
            ],
            [
                'id'    => 131,
                'title' => 'validation_demande_create',
            ],
            [
                'id'    => 132,
                'title' => 'validation_demande_edit',
            ],
            [
                'id'    => 133,
                'title' => 'validation_demande_show',
            ],
            [
                'id'    => 134,
                'title' => 'validation_demande_delete',
            ],
            [
                'id'    => 135,
                'title' => 'validation_demande_access',
            ],
            [
                'id'    => 136,
                'title' => 'livraison_create',
            ],
            [
                'id'    => 137,
                'title' => 'livraison_edit',
            ],
            [
                'id'    => 138,
                'title' => 'livraison_show',
            ],
            [
                'id'    => 139,
                'title' => 'livraison_delete',
            ],
            [
                'id'    => 140,
                'title' => 'livraison_access',
            ],
            [
                'id'    => 141,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
