<aside class="main-sidebar">
    <section class="sidebar" style="height: auto;">
        <ul class="sidebar-menu tree" data-widget="tree">
            <li>
                <a href="{{ route("admin.home") }}">
                    <i class="fas fa-fw fa-tachometer-alt">

                    </i>
                    {{ trans('global.dashboard') }}
                </a>
            </li>
            @can('user_management_access')
                <li class="treeview">
                    <a href="#">
                        <i class="fa-fw fas fa-users">

                        </i>
                        <span>{{ trans('cruds.userManagement.title') }}</span>
                        <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        @can('permission_access')
                            <li class="{{ request()->is("admin/permissions") || request()->is("admin/permissions/*") ? "active" : "" }}">
                                <a href="{{ route("admin.permissions.index") }}">
                                    <i class="fa-fw fas fa-unlock-alt">

                                    </i>
                                    <span>{{ trans('cruds.permission.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('role_access')
                            <li class="{{ request()->is("admin/roles") || request()->is("admin/roles/*") ? "active" : "" }}">
                                <a href="{{ route("admin.roles.index") }}">
                                    <i class="fa-fw fas fa-briefcase">

                                    </i>
                                    <span>{{ trans('cruds.role.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('user_access')
                            <li class="{{ request()->is("admin/users") || request()->is("admin/users/*") ? "active" : "" }}">
                                <a href="{{ route("admin.users.index") }}">
                                    <i class="fa-fw fas fa-user">

                                    </i>
                                    <span>{{ trans('cruds.user.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('team_access')
                            <li class="{{ request()->is("admin/teams") || request()->is("admin/teams/*") ? "active" : "" }}">
                                <a href="{{ route("admin.teams.index") }}">
                                    <i class="fa-fw fas fa-users">

                                    </i>
                                    <span>{{ trans('cruds.team.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('audit_log_access')
                            <li class="{{ request()->is("admin/audit-logs") || request()->is("admin/audit-logs/*") ? "active" : "" }}">
                                <a href="{{ route("admin.audit-logs.index") }}">
                                    <i class="fa-fw fas fa-file-alt">

                                    </i>
                                    <span>{{ trans('cruds.auditLog.title') }}</span>

                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('product_management_access')
                <li class="treeview">
                    <a href="#">
                        <i class="fa-fw fas fa-shopping-cart">

                        </i>
                        <span>{{ trans('cruds.productManagement.title') }}</span>
                        <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        @can('rangement_access')
                            <li class="{{ request()->is("admin/rangements") || request()->is("admin/rangements/*") ? "active" : "" }}">
                                <a href="{{ route("admin.rangements.index") }}">
                                    <i class="fa-fw fas fa-folder">

                                    </i>
                                    <span>{{ trans('cruds.rangement.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('product_category_access')
                            <li class="{{ request()->is("admin/product-categories") || request()->is("admin/product-categories/*") ? "active" : "" }}">
                                <a href="{{ route("admin.product-categories.index") }}">
                                    <i class="fa-fw fas fa-folder">

                                    </i>
                                    <span>{{ trans('cruds.productCategory.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('product_access')
                            <li class="{{ request()->is("admin/products") || request()->is("admin/products/*") ? "active" : "" }}">
                                <a href="{{ route("admin.products.index") }}">
                                    <i class="fa-fw fas fa-shopping-cart">

                                    </i>
                                    <span>{{ trans('cruds.product.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('product_tag_access')
                            <li class="{{ request()->is("admin/product-tags") || request()->is("admin/product-tags/*") ? "active" : "" }}">
                                <a href="{{ route("admin.product-tags.index") }}">
                                    <i class="fa-fw fas fa-folder">

                                    </i>
                                    <span>{{ trans('cruds.productTag.title') }}</span>

                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('demande_stock_management_access')
                <li class="treeview">
                    <a href="#">
                        <i class="fa-fw fas fa-cogs">

                        </i>
                        <span>{{ trans('cruds.demandeStockManagement.title') }}</span>
                        <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        @can('demande_access')
                            <li class="{{ request()->is("admin/demandes") || request()->is("admin/demandes/*") ? "active" : "" }}">
                                <a href="{{ route("admin.demandes.index") }}">
                                    <i class="fa-fw fas fa-cogs">

                                    </i>
                                    <span>{{ trans('cruds.demande.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('ligne_demande_access')
                            <li class="{{ request()->is("admin/ligne-demandes") || request()->is("admin/ligne-demandes/*") ? "active" : "" }}">
                                <a href="{{ route("admin.ligne-demandes.index") }}">
                                    <i class="fa-fw fas fa-cogs">

                                    </i>
                                    <span>{{ trans('cruds.ligneDemande.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('validation_demande_access')
                            <li class="{{ request()->is("admin/validation-demandes") || request()->is("admin/validation-demandes/*") ? "active" : "" }}">
                                <a href="{{ route("admin.validation-demandes.index") }}">
                                    <i class="fa-fw fas fa-cogs">

                                    </i>
                                    <span>{{ trans('cruds.validationDemande.title') }}</span>

                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('achat_management_access')
                <li class="treeview">
                    <a href="#">
                        <i class="fa-fw fas fa-cogs">

                        </i>
                        <span>{{ trans('cruds.achatManagement.title') }}</span>
                        <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        @can('demande_achat_access')
                            <li class="{{ request()->is("admin/demande-achats") || request()->is("admin/demande-achats/*") ? "active" : "" }}">
                                <a href="{{ route("admin.demande-achats.index") }}">
                                    <i class="fa-fw fas fa-cogs">

                                    </i>
                                    <span>{{ trans('cruds.demandeAchat.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('validation_achat_access')
                            <li class="{{ request()->is("admin/validation-achats") || request()->is("admin/validation-achats/*") ? "active" : "" }}">
                                <a href="{{ route("admin.validation-achats.index") }}">
                                    <i class="fa-fw fas fa-cogs">

                                    </i>
                                    <span>{{ trans('cruds.validationAchat.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('demande_prix_access')
                            <li class="{{ request()->is("admin/demande-prixes") || request()->is("admin/demande-prixes/*") ? "active" : "" }}">
                                <a href="{{ route("admin.demande-prixes.index") }}">
                                    <i class="fa-fw fas fa-cogs">

                                    </i>
                                    <span>{{ trans('cruds.demandePrix.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('commande_access')
                            <li class="{{ request()->is("admin/commandes") || request()->is("admin/commandes/*") ? "active" : "" }}">
                                <a href="{{ route("admin.commandes.index") }}">
                                    <i class="fa-fw fas fa-folder">

                                    </i>
                                    <span>{{ trans('cruds.commande.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('liste_commande_access')
                            <li class="{{ request()->is("admin/liste-commandes") || request()->is("admin/liste-commandes/*") ? "active" : "" }}">
                                <a href="{{ route("admin.liste-commandes.index") }}">
                                    <i class="fa-fw fas fa-cogs">

                                    </i>
                                    <span>{{ trans('cruds.listeCommande.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('tva_access')
                            <li class="{{ request()->is("admin/tvas") || request()->is("admin/tvas/*") ? "active" : "" }}">
                                <a href="{{ route("admin.tvas.index") }}">
                                    <i class="fa-fw fas fa-cogs">

                                    </i>
                                    <span>{{ trans('cruds.tva.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('livraison_access')
                            <li class="{{ request()->is("admin/livraisons") || request()->is("admin/livraisons/*") ? "active" : "" }}">
                                <a href="{{ route("admin.livraisons.index") }}">
                                    <i class="fa-fw fas fa-cogs">

                                    </i>
                                    <span>{{ trans('cruds.livraison.title') }}</span>

                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('contact_management_access')
                <li class="treeview">
                    <a href="#">
                        <i class="fa-fw fas fa-phone-square">

                        </i>
                        <span>{{ trans('cruds.contactManagement.title') }}</span>
                        <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        @can('contact_company_access')
                            <li class="{{ request()->is("admin/contact-companies") || request()->is("admin/contact-companies/*") ? "active" : "" }}">
                                <a href="{{ route("admin.contact-companies.index") }}">
                                    <i class="fa-fw fas fa-building">

                                    </i>
                                    <span>{{ trans('cruds.contactCompany.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('contact_contact_access')
                            <li class="{{ request()->is("admin/contact-contacts") || request()->is("admin/contact-contacts/*") ? "active" : "" }}">
                                <a href="{{ route("admin.contact-contacts.index") }}">
                                    <i class="fa-fw fas fa-user-plus">

                                    </i>
                                    <span>{{ trans('cruds.contactContact.title') }}</span>

                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('faq_management_access')
                <li class="treeview">
                    <a href="#">
                        <i class="fa-fw fas fa-question">

                        </i>
                        <span>{{ trans('cruds.faqManagement.title') }}</span>
                        <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        @can('faq_category_access')
                            <li class="{{ request()->is("admin/faq-categories") || request()->is("admin/faq-categories/*") ? "active" : "" }}">
                                <a href="{{ route("admin.faq-categories.index") }}">
                                    <i class="fa-fw fas fa-briefcase">

                                    </i>
                                    <span>{{ trans('cruds.faqCategory.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('faq_question_access')
                            <li class="{{ request()->is("admin/faq-questions") || request()->is("admin/faq-questions/*") ? "active" : "" }}">
                                <a href="{{ route("admin.faq-questions.index") }}">
                                    <i class="fa-fw fas fa-question">

                                    </i>
                                    <span>{{ trans('cruds.faqQuestion.title') }}</span>

                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('user_alert_access')
                <li class="{{ request()->is("admin/user-alerts") || request()->is("admin/user-alerts/*") ? "active" : "" }}">
                    <a href="{{ route("admin.user-alerts.index") }}">
                        <i class="fa-fw fas fa-bell">

                        </i>
                        <span>{{ trans('cruds.userAlert.title') }}</span>

                    </a>
                </li>
            @endcan
            @can('basic_c_r_m_access')
                <li class="treeview">
                    <a href="#">
                        <i class="fa-fw fas fa-briefcase">

                        </i>
                        <span>{{ trans('cruds.basicCRM.title') }}</span>
                        <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        @can('crm_status_access')
                            <li class="{{ request()->is("admin/crm-statuses") || request()->is("admin/crm-statuses/*") ? "active" : "" }}">
                                <a href="{{ route("admin.crm-statuses.index") }}">
                                    <i class="fa-fw fas fa-folder">

                                    </i>
                                    <span>{{ trans('cruds.crmStatus.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('crm_customer_access')
                            <li class="{{ request()->is("admin/crm-customers") || request()->is("admin/crm-customers/*") ? "active" : "" }}">
                                <a href="{{ route("admin.crm-customers.index") }}">
                                    <i class="fa-fw fas fa-user-plus">

                                    </i>
                                    <span>{{ trans('cruds.crmCustomer.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('crm_note_access')
                            <li class="{{ request()->is("admin/crm-notes") || request()->is("admin/crm-notes/*") ? "active" : "" }}">
                                <a href="{{ route("admin.crm-notes.index") }}">
                                    <i class="fa-fw fas fa-sticky-note">

                                    </i>
                                    <span>{{ trans('cruds.crmNote.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('crm_document_access')
                            <li class="{{ request()->is("admin/crm-documents") || request()->is("admin/crm-documents/*") ? "active" : "" }}">
                                <a href="{{ route("admin.crm-documents.index") }}">
                                    <i class="fa-fw fas fa-folder">

                                    </i>
                                    <span>{{ trans('cruds.crmDocument.title') }}</span>

                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            <li class="{{ request()->is("admin/system-calendar") || request()->is("admin/system-calendar/*") ? "active" : "" }}">
                <a href="{{ route("admin.systemCalendar") }}">
                    <i class="fas fa-fw fa-calendar">

                    </i>
                    <span>{{ trans('global.systemCalendar') }}</span>
                </a>
            </li>
            @php($unread = \App\Models\QaTopic::unreadCount())
                <li class="{{ request()->is("admin/messenger") || request()->is("admin/messenger/*") ? "active" : "" }}">
                    <a href="{{ route("admin.messenger.index") }}">
                        <i class="fa-fw fa fa-envelope">

                        </i>
                        <span>{{ trans('global.messages') }}</span>
                        @if($unread > 0)
                            <strong>( {{ $unread }} )</strong>
                        @endif

                    </a>
                </li>
                @if(\Illuminate\Support\Facades\Schema::hasColumn('teams', 'owner_id') && \App\Models\Team::where('owner_id', auth()->user()->id)->exists())
                    <li class="nav-item">
                        <a class="{{ request()->is("admin/team-members") || request()->is("admin/team-members/*") ? "active" : "" }}" href="{{ route("admin.team-members.index") }}">
                            <i class="fa-fw fa fa-users">
                            </i>
                            <span>{{ trans("global.team-members") }}</span>
                        </a>
                    </li>
                @endif
                @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
                    @can('profile_password_edit')
                        <li class="{{ request()->is('profile/password') || request()->is('profile/password/*') ? 'active' : '' }}">
                            <a href="{{ route('profile.password.edit') }}">
                                <i class="fa-fw fas fa-key">
                                </i>
                                {{ trans('global.change_password') }}
                            </a>
                        </li>
                    @endcan
                @endif
                <li>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fas fa-fw fa-sign-out-alt">

                        </i>
                        {{ trans('global.logout') }}
                    </a>
                </li>

                <!-- Logout Modal-->
                {{-- <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Etes vous sûre de vous déconnecter ?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        </div>
                        <div class="modal-body">Selectionner "Déconnexion" si vous êtes prêt à quitter la session.</div>
                        <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Annuler</button>
                        <a class="btn btn-primary" href="#">Déconnexion</a>
                        </div>
                    </div>
                    </div>
                </div> --}}
        </ul>
    </section>
</aside>