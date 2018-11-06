



<li class="{{ Request::is('users*') ? 'active' : '' }}">
    <a href="{!! route('admin.users.index') !!}"><i class="fa fa-edit"></i><span>Users</span></a>
</li>

<li class="{{ Request::is('userRoles*') ? 'active' : '' }}">
    <a href="{!! route('admin.userRoles.index') !!}"><i class="fa fa-edit"></i><span>User Roles</span></a>
</li>

<li class="{{ Request::is('userStatuses*') ? 'active' : '' }}">
    <a href="{!! route('admin.userStatuses.index') !!}"><i class="fa fa-edit"></i><span>User Statuses</span></a>
</li>

<li class="{{ Request::is('companies*') ? 'active' : '' }}">
    <a href="{!! route('admin.companies.index') !!}"><i class="fa fa-edit"></i><span>Companies</span></a>
</li>







<li class="{{ Request::is('modules*') ? 'active' : '' }}">
    <a href="{!! route('admin.modules.index') !!}"><i class="fa fa-edit"></i><span>Modules</span></a>
</li>


<li class="{{ Request::is('companyContactPeople*') ? 'active' : '' }}">
    <a href="{!! route('admin.companyContactPeople.index') !!}"><i class="fa fa-edit"></i><span>Company Contact People</span></a>
</li>

<li class="{{ Request::is('companyBuildings*') ? 'active' : '' }}">
    <a href="{!! route('admin.companyBuildings.index') !!}"><i class="fa fa-edit"></i><span>Company Buildings</span></a>
</li>

<li class="{{ Request::is('companyFloorRooms*') ? 'active' : '' }}">
    <a href="{!! route('admin.companyFloorRooms.index') !!}"><i class="fa fa-edit"></i><span>Company Floor Rooms</span></a>
</li>


<li class="{{ Request::is('companyContracts*') ? 'active' : '' }}">
    <a href="{!! route('admin.companyContracts.index') !!}"><i class="fa fa-edit"></i><span>Company Contracts</span></a>
</li>

<li class="{{ Request::is('discountTypes*') ? 'active' : '' }}">
    <a href="{!! route('admin.discountTypes.index') !!}"><i class="fa fa-edit"></i><span>Discount Types</span></a>
</li>


<li class="{{ Request::is('companyModules*') ? 'active' : '' }}">
    <a href="{!! route('admin.companyModules.index') !!}"><i class="fa fa-edit"></i><span>Company Modules</span></a>
</li>

<li class="{{ Request::is('companyUsers*') ? 'active' : '' }}">
    <a href="{!! route('admin.companyUsers.index') !!}"><i class="fa fa-edit"></i><span>Company Users</span></a>
</li>

<li class="{{ Request::is('companyInvoices*') ? 'active' : '' }}">
    <a href="{!! route('admin.companyInvoices.index') !!}"><i class="fa fa-edit"></i><span>Company Invoices</span></a>
</li>

<li class="{{ Request::is('roomLayouts*') ? 'active' : '' }}">
    <a href="{!! route('companyConference.roomLayouts.index') !!}"><i class="fa fa-edit"></i><span>Room Layouts</span></a>
</li>

<li class="{{ Request::is('roomLayouts*') ? 'active' : '' }}">
    <a href="{!! route('company/Conference.roomLayouts.index') !!}"><i class="fa fa-edit"></i><span>Room Layouts</span></a>
</li>

<li class="{{ Request::is('foods*') ? 'active' : '' }}">
    <a href="{!! route('company.conference.foods.index') !!}"><i class="fa fa-edit"></i><span>Foods</span></a>
</li>

<li class="{{ Request::is('packages*') ? 'active' : '' }}">
    <a href="{!! route('company.conference.packages.index') !!}"><i class="fa fa-edit"></i><span>Packages</span></a>
</li>

<li class="{{ Request::is('equipmentCriterias*') ? 'active' : '' }}">
    <a href="{!! route('company.conference.equipmentCriterias.index') !!}"><i class="fa fa-edit"></i><span>Equipment Criterias</span></a>
</li>

<li class="{{ Request::is('equipments*') ? 'active' : '' }}">
    <a href="{!! route('company.conference.equipments.index') !!}"><i class="fa fa-edit"></i><span>Equipments</span></a>
</li>

<li class="{{ Request::is('conferenceBookings*') ? 'active' : '' }}">
    <a href="{!! route('company/Conference.conferenceBookings.index') !!}"><i class="fa fa-edit"></i><span>Conference Bookings</span></a>
</li>

<li class="{{ Request::is('conferenceDurations*') ? 'active' : '' }}">
    <a href="{!! route('company/Conference.conferenceDurations.index') !!}"><i class="fa fa-edit"></i><span>Conference Durations</span></a>
</li>

<li class="{{ Request::is('conferenceBookingItems*') ? 'active' : '' }}">
    <a href="{!! route('company/Conference.conferenceBookingItems.index') !!}"><i class="fa fa-edit"></i><span>Conference Booking Items</span></a>
</li>

<li class="{{ Request::is('paymentMethods*') ? 'active' : '' }}">
    <a href="{!! route('admin.paymentMethods.index') !!}"><i class="fa fa-edit"></i><span>Payment Methods</span></a>
</li>

<li class="{{ Request::is('paymentCycles*') ? 'active' : '' }}">
    <a href="{!! route('admin.paymentCycles.index') !!}"><i class="fa fa-edit"></i><span>Payment Cycles</span></a>
</li>

<li class="{{ Request::is('permissions*') ? 'active' : '' }}">
    <a href="{!! route('admin.permissions.index') !!}"><i class="fa fa-edit"></i><span>Permissions</span></a>
</li>

<li class="{{ Request::is('supportStatuses*') ? 'active' : '' }}">
    <a href="{!! route('admin.supportStatuses.index') !!}"><i class="fa fa-edit"></i><span>Support Statuses</span></a>
</li>

<li class="{{ Request::is('supportCategories*') ? 'active' : '' }}">
    <a href="{!! route('admin.supportCategories.index') !!}"><i class="fa fa-edit"></i><span>Support Categories</span></a>
</li>

<li class="{{ Request::is('supportPriorities*') ? 'active' : '' }}">
    <a href="{!! route('admin.supportPriorities.index') !!}"><i class="fa fa-edit"></i><span>Support Priorities</span></a>
</li>

<li class="{{ Request::is('supports*') ? 'active' : '' }}">
    <a href="{!! route('admin.supports.index') !!}"><i class="fa fa-edit"></i><span>Supports</span></a>
</li>


<li class="{{ Request::is('bookingAgencies*') ? 'active' : '' }}">
    <a href="{!! route('company.bookingAgencies.index') !!}"><i class="fa fa-edit"></i><span>Booking Agencies</span></a>

<li class="{{ Request::is('companySupports*') ? 'active' : '' }}">
    <a href="{!! route('company.companySupports.index') !!}"><i class="fa fa-edit"></i><span>Company Supports</span></a>
</li>

<li class="{{ Request::is('companyCustomers*') ? 'active' : '' }}">
    <a href="{!! route('companyCustomers.index') !!}"><i class="fa fa-edit"></i><span>Company Customers</span></a>
</li>

<li class="{{ Request::is('roomSettingArrangments*') ? 'active' : '' }}">
    <a href="{!! route('roomSettingArrangments.index') !!}"><i class="fa fa-edit"></i><span>Room Setting Arrangments</span></a>
</li>

<li class="{{ Request::is('roomSettingArrangments*') ? 'active' : '' }}">
    <a href="{!! route('company.roomSettingArrangments.index') !!}"><i class="fa fa-edit"></i><span>Room Setting Arrangments</span></a>
</li>

<li class="{{ Request::is('roomImages*') ? 'active' : '' }}">
    <a href="{!! route('company.roomImages.index') !!}"><i class="fa fa-edit"></i><span>Room Images</span></a>
</li>

<li class="{{ Request::is('roomEquipments*') ? 'active' : '' }}">
    <a href="{!! route('company.roomEquipments.index') !!}"><i class="fa fa-edit"></i><span>Room Equipments</span></a>
</li>

<li class="{{ Request::is('roomNotes*') ? 'active' : '' }}">
    <a href="{!! route('company.roomNotes.index') !!}"><i class="fa fa-edit"></i><span>Room Notes</span></a>

</li>

<li class="{{ Request::is('currencies*') ? 'active' : '' }}">
    <a href="{!! route('company.currencies.index') !!}"><i class="fa fa-edit"></i><span>Currencies</span></a>
</li>

<li class="{{ Request::is('leaseAttachments*') ? 'active' : '' }}">
    <a href="{!! route('company.leaseAttachments.index') !!}"><i class="fa fa-edit"></i><span>Lease Attachments</span></a>
</li>

<li class="{{ Request::is('leasePartners*') ? 'active' : '' }}">
    <a href="{!! route('company.leasePartners.index') !!}"><i class="fa fa-edit"></i><span>Lease Partners</span></a>
</li>

<li class="{{ Request::is('leaseCounterparts*') ? 'active' : '' }}">
    <a href="{!! route('company.leaseCounterparts.index') !!}"><i class="fa fa-edit"></i><span>Lease Counterparts</span></a>
</li>

<li class="{{ Request::is('leaseContractInformations*') ? 'active' : '' }}">
    <a href="{!! route('company.leaseContractInformations.index') !!}"><i class="fa fa-edit"></i><span>Lease Contract Informations</span></a>
<li class="{{ Request::is('hrCivilStatuses*') ? 'active' : '' }}">
    <a href="{!! route('company.hrCivilStatuses.index') !!}"><i class="fa fa-edit"></i><span>Hr Civil Statuses</span></a>
</li>

<li class="{{ Request::is('companyHrs*') ? 'active' : '' }}">
    <a href="{!! route('company.companyHrs.index') !!}"><i class="fa fa-edit"></i><span>Company Hrs</span></a>
</li>

<li class="{{ Request::is('hrPersonalCats*') ? 'active' : '' }}">
    <a href="{!! route('company.hrPersonalCats.index') !!}"><i class="fa fa-edit"></i><span>Hr Personal Cats</span></a>
</li>

<li class="{{ Request::is('hrCompanyCollectives*') ? 'active' : '' }}">
    <a href="{!! route('company.hrCompanyCollectives.index') !!}"><i class="fa fa-edit"></i><span>Hr Company Collectives</span></a>
</li>

<li class="{{ Request::is('hrCompanyemployments*') ? 'active' : '' }}">
    <a href="{!! route('company.hrCompanyemployments.index') !!}"><i class="fa fa-edit"></i><span>Hr Companyemployments</span></a>
</li>

<li class="{{ Request::is('hrCompanyDesignations*') ? 'active' : '' }}">
    <a href="{!! route('company.hrCompanyDesignations.index') !!}"><i class="fa fa-edit"></i><span>Hr Company Designations</span></a>
</li>

<li class="{{ Request::is('hrCompanyEmployments*') ? 'active' : '' }}">
    <a href="{!! route('company.hrCompanyEmployments.index') !!}"><i class="fa fa-edit"></i><span>Hr Company Employments</span></a>
</li>

<li class="{{ Request::is('hrEmploymentForms*') ? 'active' : '' }}">
    <a href="{!! route('company.hrEmploymentForms.index') !!}"><i class="fa fa-edit"></i><span>Hr Employment Forms</span></a>
</li>

<li class="{{ Request::is('hrSalaryTypes*') ? 'active' : '' }}">
    <a href="{!! route('company.hrSalaryTypes.index') !!}"><i class="fa fa-edit"></i><span>Hr Salary Types</span></a>
</li>

<li class="{{ Request::is('hrCompanyProjects*') ? 'active' : '' }}">
    <a href="{!! route('company.hrCompanyProjects.index') !!}"><i class="fa fa-edit"></i><span>Hr Company Projects</span></a>
</li>

<li class="{{ Request::is('hrVacationCategories*') ? 'active' : '' }}">
    <a href="{!! route('company.hrVacationCategories.index') !!}"><i class="fa fa-edit"></i><span>Hr Vacation Categories</span></a>

</li>

<li class="{{ Request::is('hRCourses*') ? 'active' : '' }}">
    <a href="{!! route('company.hRCourses.index') !!}"><i class="fa fa-edit"></i><span>H R Courses</span></a>
</li>

<li class="{{ Request::is('companyHrOtherInfos*') ? 'active' : '' }}">
    <a href="{!! route('company.companyHrOtherInfos.index') !!}"><i class="fa fa-edit"></i><span>Company Hr Other Infos</span></a>
</li>

<li class="{{ Request::is('companyHrPreEmployments*') ? 'active' : '' }}">
    <a href="{!! route('company.companyHrPreEmployments.index') !!}"><i class="fa fa-edit"></i><span>Company Hr Pre Employments</span></a>
</li>

<li class="{{ Request::is('companyHrNotes*') ? 'active' : '' }}">
    <a href="{!! route('company.companyHrNotes.index') !!}"><i class="fa fa-edit"></i><span>Company Hr Notes</span></a>
</li>

<li class="{{ Request::is('companyHrDocuments*') ? 'active' : '' }}">
    <a href="{!! route('company.companyHrDocuments.index') !!}"><i class="fa fa-edit"></i><span>Company Hr Documents</span></a>
</li>

<li class="{{ Request::is('conferenceBookingDrafts*') ? 'active' : '' }}">
    <a href="{!! route('conferenceBookingDrafts.index') !!}"><i class="fa fa-edit"></i><span>Conference Booking Drafts</span></a>
</li>


<li class="{{ Request::is('conferenceBookingSignages*') ? 'active' : '' }}">
    <a href="{!! route('conferenceBookingSignages.index') !!}"><i class="fa fa-edit"></i><span>Conference Booking Signages</span></a>
</li>
<li class="{{ Request::is('conferenceBookingNotes*') ? 'active' : '' }}">
    <a href="{!! route('company.conferenceBookingNotes.index') !!}"><i class="fa fa-edit"></i><span>Conference Booking Notes</span></a>

</li>

<li class="{{ Request::is('users*') ? 'active' : '' }}">
    <a href="{!! route('users.index') !!}"><i class="fa fa-edit"></i><span>Users</span></a>
</li>

<li class="{{ Request::is('roles*') ? 'active' : '' }}">
    <a href="{!! route('roles.index') !!}"><i class="fa fa-edit"></i><span>Roles</span></a>
</li>

<li class="{{ Request::is('statuses*') ? 'active' : '' }}">
    <a href="{!! route('statuses.index') !!}"><i class="fa fa-edit"></i><span>Statuses</span></a>
</li>

<li class="{{ Request::is('famousPlaces*') ? 'active' : '' }}">
    <a href="{!! route('famousPlaces.index') !!}"><i class="fa fa-edit"></i><span>Famous Places</span></a>
</li>

<li class="{{ Request::is('packages*') ? 'active' : '' }}">
    <a href="{!! route('packages.index') !!}"><i class="fa fa-edit"></i><span>Packages</span></a>
</li>

<li class="{{ Request::is('prices*') ? 'active' : '' }}">
    <a href="{!! route('prices.index') !!}"><i class="fa fa-edit"></i><span>Prices</span></a>
</li>

<li class="{{ Request::is('accomodations*') ? 'active' : '' }}">
    <a href="{!! route('accomodations.index') !!}"><i class="fa fa-edit"></i><span>Accomodations</span></a>
</li>

<li class="{{ Request::is('hotels*') ? 'active' : '' }}">
    <a href="{!! route('hotels.index') !!}"><i class="fa fa-edit"></i><span>Hotels</span></a>
</li>

<li class="{{ Request::is('rooms*') ? 'active' : '' }}">
    <a href="{!! route('rooms.index') !!}"><i class="fa fa-edit"></i><span>Rooms</span></a>
</li>

<li class="{{ Request::is('bookings*') ? 'active' : '' }}">
    <a href="{!! route('bookings.index') !!}"><i class="fa fa-edit"></i><span>Bookings</span></a>
</li>

<li class="{{ Request::is('categories*') ? 'active' : '' }}">
    <a href="{!! route('categories.index') !!}"><i class="fa fa-edit"></i><span>Categories</span></a>
</li>

<li class="{{ Request::is('pages*') ? 'active' : '' }}">
    <a href="{!! route('pages.index') !!}"><i class="fa fa-edit"></i><span>Pages</span></a>
</li>

<li class="{{ Request::is('webSettings*') ? 'active' : '' }}">
    <a href="{!! route('webSettings.index') !!}"><i class="fa fa-edit"></i><span>Web Settings</span></a>
</li>

<li class="{{ Request::is('blogCategories*') ? 'active' : '' }}">
    <a href="{!! route('blogCategories.index') !!}"><i class="fa fa-edit"></i><span>Blog Categories</span></a>
</li>

<li class="{{ Request::is('blogPosts*') ? 'active' : '' }}">
    <a href="{!! route('blogPosts.index') !!}"><i class="fa fa-edit"></i><span>Blog Posts</span></a>
</li>

