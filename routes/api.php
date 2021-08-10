<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {
    // Permissions
    Route::apiResource('permissions', 'PermissionsApiController');

    // Roles
    Route::apiResource('roles', 'RolesApiController');

    // Users
    Route::apiResource('users', 'UsersApiController');

    // Product Category
    Route::apiResource('product-categories', 'ProductCategoryApiController');

    // Product Tag
    Route::apiResource('product-tags', 'ProductTagApiController');

    // Product
    Route::apiResource('products', 'ProductApiController');

    // Rangement
    Route::apiResource('rangements', 'RangementApiController');

    // Demande
    Route::apiResource('demandes', 'DemandeApiController');

    // Commande
    Route::apiResource('commandes', 'CommandeApiController');

    // Team
    Route::apiResource('teams', 'TeamApiController');

    // Contact Company
    Route::apiResource('contact-companies', 'ContactCompanyApiController');

    // Contact Contacts
    Route::apiResource('contact-contacts', 'ContactContactsApiController');

    // Faq Category
    Route::apiResource('faq-categories', 'FaqCategoryApiController');

    // Faq Question
    Route::apiResource('faq-questions', 'FaqQuestionApiController');

    // Tva
    Route::apiResource('tvas', 'TvaApiController');

    // Liste Commande
    Route::apiResource('liste-commandes', 'ListeCommandeApiController');

    // Demande Prix
    Route::apiResource('demande-prixes', 'DemandePrixApiController');

    // Demande Achat
    Route::apiResource('demande-achats', 'DemandeAchatApiController');

    // Ligne Demande
    Route::apiResource('ligne-demandes', 'LigneDemandeApiController', ['except' => ['store', 'update', 'destroy']]);

    // Validation Achat
    Route::apiResource('validation-achats', 'ValidationAchatApiController');

    // Validation Demande
    Route::apiResource('validation-demandes', 'ValidationDemandeApiController');
});
