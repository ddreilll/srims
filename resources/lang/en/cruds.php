<?php

return [
    'permission'     => [
        'title'          => 'Permissions',
        'title_singular' => 'Permission',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => '',
            'title'             => 'Title',
            'title_helper'      => '',
            'created_at'        => 'Created at',
            'created_at_helper' => '',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => '',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => '',
        ],
    ],
    'role'           => [
        'title'          => 'Roles',
        'title_singular' => 'Role',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => '',
            'title'              => 'Title',
            'title_helper'       => '',
            'permissions'        => 'Permissions',
            'permissions_helper' => '',
            'created_at'         => 'Created at',
            'created_at_helper'  => '',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => '',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => '',
        ],
    ],
    'userManagement' => [
        'title'          => 'User Account and Access Management',
        'title_singular' => 'User Account and Access Management',
    ],
    'systemConfigMaintenance' => [
        'title'          => 'System Configuration and Maintenance',
        'title_singular' => 'System Configuration and Maintenance',
    ],
    'user'           => [
        'title'          => 'Users',
        'title_singular' => 'User',
        'fields'         => [
            'id'                       => 'ID',
            'id_helper'                => '',
            'name'                     => 'Name',
            'name_helper'              => '',
            'email'                    => 'Email',
            'email_helper'             => '',
            'email_verified_at'        => 'Email verified at',
            'email_verified_at_helper' => '',
            'password'                 => 'Password',
            'password_helper'          => '',
            'is_active'                    => 'Status',
            'is_active_helper'             => '',
            'last_seen'                    => 'Last seen',
            'last_seen_helper'             => '',
            'roles'                    => 'Role',
            'roles_helper'             => '',
            'remember_token'           => 'Remember Token',
            'remember_token_helper'    => '',
            'created_at'               => 'Created at',
            'created_at_helper'        => '',
            'updated_at'               => 'Updated at',
            'updated_at_helper'        => '',
            'deleted_at'               => 'Deleted at',
            'deleted_at_helper'        => '',
        ],
    ],
    'honor'           => [
        'title'          => 'Honors',
        'title_singular' => 'Honor',
        'fields'         => [
            'honor_id'                 => 'ID',
            'honor_id_helper'          => '',
            'honor_name'              => 'Name',
            'honor_name_helper'       => '',
            'honor_createdAt'         => 'Created at',
            'honor_createdAt_helper'  => '',
            'honor_updatedAt'         => 'Updated at',
            'honor_updatedAt_helper'  => '',
            'honor_deletedAt'         => 'Deleted at',
            'honor_deletedAt_helper'  => '',
        ],
    ],
    'semester'           => [
        'title'          => 'Semesters',
        'title_singular' => 'Semester',
        'fields'         => [
            'term_id'                 => 'ID',
            'term_id_helper'          => '',
            'term_order'              => 'Order',
            'term_order_helper'       => '',
            'term_name'              => 'Name',
            'term_name_helper'       => '',
            'term_createdAt'         => 'Created at',
            'term_createdAt_helper'  => '',
            'term_updatedAt'         => 'Updated at',
            'term_updatedAt_helper'  => '',
            'term_deletedAt'         => 'Deleted at',
            'term_deletedAt_helper'  => '',
        ],
    ],
    'yearLevel'           => [
        'title'          => 'Year Levels',
        'title_singular' => 'Year Level',
        'fields'         => [
            'year_id'                 => 'ID',
            'year_id_helper'          => '',
            'year_order'              => 'Order',
            'year_order_helper'       => '',
            'year_name'              => 'Name',
            'year_name_helper'       => '',
            'year_createdAt'         => 'Created at',
            'year_createdAt_helper'  => '',
            'year_updatedAt'         => 'Updated at',
            'year_updatedAt_helper'  => '',
            'year_deletedAt'         => 'Deleted at',
            'year_deletedAt_helper'  => '',
        ],
    ],
    'schoolYear'           => [
        'title'          => 'School Years',
        'title_singular' => 'School Year',
        'fields'         => [
            'syear_id'                 => 'ID',
            'syear_id_helper'          => '',
            'syear_year'              => 'Year',
            'syear_year_helper'       => '',
            'syear_createdAt'         => 'Created at',
            'syear_createdAt_helper'  => '',
            'syear_updatedAt'         => 'Updated at',
            'syear_updatedAt_helper'  => '',
            'syear_deletedAt'         => 'Deleted at',
            'syear_deletedAt_helper'  => '',
        ],
    ],
    'instructor' => [
        'title'          => 'Instructors',
        'title_singular' => 'Instructor',
        'fields' => [
            'inst_id'                   => 'ID',
            'inst_id_helper'            => '',
            'inst_empNo'                => 'Employee No.',
            'inst_empNo_helper'         => '',
            'full_name'            => 'Full Name',
            'full_name_helper'     => '',
            'inst_firstName'            => 'First Name',
            'inst_firstName_helper'     => '',
            'inst_middleName'           => 'Middle Name',
            'inst_middleName_helper'    => '',
            'inst_lastName'             => 'Last Name',
            'inst_lastName_helper'      => '',
            'inst_createdAt'            => 'Created at',
            'inst_createdAt_helper'     => '',
            'inst_updatedAt'            => 'Updated at',
            'inst_updatedAt_helper'     => '',
            'inst_deletedAt'            => 'Deleted at',
            'inst_deletedAt_helper'     => '',
        ],
    ],
    'document'           => [
        'title'          => 'Documents',
        'title_singular' => 'Document',
        'fields'         => [
            'docu_id'                   => 'ID',
            'docu_id_helper'            => '',
            'docu_name'                 => 'Name',
            'docu_name_helper'          => '',
            'docu_description'          => 'Description',
            'docu_description_helper'   => '',
            'docu_category'             => 'Category',
            'docu_category_helper'      => '',
            'docu_isPermanent'          => 'Is Permanent',
            'docu_isPermanent_helper'   => '',
            'docu_types'          => 'Types',
            'docu_types_helper'   => '',
            'docu_createdAt'            => 'Created at',
            'docu_createdAt_helper'     => '',
            'docu_updatedAt'            => 'Updated at',
            'docu_updatedAt_helper'     => '',
            'docu_deletedAt'            => 'Deleted at',
            'docu_deletedAt_helper'     => '',
        ],
    ],
    'class'           => [
        'title'          => 'Classes',
        'title_singular' => 'Class',
        'fields'         => [
            'class_id'                  => 'ID',
            'class_id_helper'           => '',
            'class_section'             => 'sSection',
            'class_section_helper'      => '',
            'class_acadYear'            => 'Academic Year',
            'class_acadYear_helper'     => '',
            'class_fstorage'            => 'File Storage',
            'class_fstorage_helper'     => '',
            'class_flink'               => 'File Link',
            'class_flink_helper'        => '',
            'class_fname'               => 'File Name',
            'class_fname_helper'        => '',
            'class_term_id'             => 'Term ID',
            'class_term_id_helper'      => '',
            'class_room_id'             => 'Room ID',
            'class_room_id_helper'      => '',
            'class_subj_id'             => 'Subject ID',
            'class_subj_id_helper'      => '',
            'class_inst_id'             => 'Instructor ID',
            'class_inst_id_helper'      => '',
            'class_createdAt'           => 'Created at',
            'class_createdAt_helper'    => '',
            'class_updatedAt'           => 'Updated at',
            'class_updatedAt_helper'    => '',
            'class_deletedAt'           => 'Deleted at',
            'class_deletedAt_helper'    => '',
        ],
    ],
    'student' => [
        'title'          => 'Students',
        'title_singular' => 'Student',
        'fields' => [
            'stud_id'                                   => 'ID',
            'stud_id_helper'                            => '',
            'stud_uuid'                                 => 'UUID',
            'stud_uuid_helper'                          => '',
            'stud_studentNo'                            => 'Student No.',
            'stud_studentNo_helper'                     => '',
            'stud_firstName'                            => 'First Name',
            'stud_firstName_helper'                     => '',
            'stud_middleName'                           => 'Middle Name',
            'stud_middleName_helper'                    => '',
            'stud_lastName'                             => 'Last Name',
            'stud_lastName_helper'                      => '',
            'stud_addressLine'                          => 'Address Line',
            'stud_addressLine_helper'                   => '',
            'stud_addressCity'                          => 'Address City',
            'stud_addressCity_helper'                   => '',
            'stud_addressProvince'                      => 'Address Province',
            'stud_addressProvince_helper'               => '',
            'stud_yearOfAdmission'                      => 'Year of Admission',
            'stud_yearOfAdmission_helper'               => '',
            'stud_admissionType'                        => 'Admission Type',
            'stud_admissionType_helper'                 => '',
            'stud_isGraduated'                          => 'Is Graduated',
            'stud_isGraduated_helper'                   => '',
            'stud_dateExited'                           => 'Date Exited',
            'stud_dateExited_helper'                    => '',
            'stud_honor'                                => 'Honor',
            'stud_honor_helper'                         => '',
            'stud_recordType'                           => 'Record Type',
            'stud_recordType_helper'                    => '',
            'stud_academicStatus'                       => 'Academic Status',
            'stud_academicStatus_helper'                => '',
            'stud_recordStatus'                         => 'Record Status',
            'stud_recordStatus_helper'                  => '',
            'stud_isHonorableDismissed'                 => 'Is Honorable Dismissed',
            'stud_isHonorableDismissed_helper'          => '',
            'stud_honorableDismissedStatus'             => 'Honorable Dismissed Status',
            'stud_honorableDismissedStatus_helper'      => '',
            'stud_honorableDismissedDate'               => 'Honorable Dismissed Date',
            'stud_honorableDismissedDate_helper'        => '',
            'stud_honorableDismissedSchool'             => 'Honorable Dismissed School',
            'stud_honorableDismissedSchool_helper'      => '',
            'stud_validationStatus'                     => 'Validation Status',
            'stud_validationStatus_helper'              => '',
            'stud_remarks'                              => 'Remarks',
            'stud_remarks_helper'                       => '',
            'stud_cour_stud_id'                         => 'Course ID',
            'stud_cour_stud_id_helper'                  => '',
            'stud_user_stud_id'                         => 'User ID',
            'stud_user_stud_id_helper'                  => '',
            'stud_createdAt'                            => 'Created at',
            'stud_createdAt_helper'                     => '',
            'stud_updatedAt'                            => 'Updated at',
            'stud_updatedAt_helper'                     => '',
            'stud_deletedAt'                            => 'Deleted at',
            'stud_deletedAt_helper'                     => '',
        ],
    ],
    'course'           => [
        'title'          => 'Courses',
        'title_singular' => 'Course',
        'fields'         => [
            'cour_id'                 => 'ID',
            'cour_id_helper'          => '',
            'cour_code'               => 'Code',
            'cour_code_helper'        => '',
            'cour_name'               => 'Name',
            'cour_name_helper'        => '',
            'cour_createdAt'          => 'Created at',
            'cour_createdAt_helper'   => '',
            'cour_updatedAt'          => 'Updated at',
            'cour_updatedAt_helper'   => '',
            'cour_deletedAt'          => 'Deleted at',
            'cour_deletedAt_helper'   => '',
        ],
    ],
    'documentType'           => [
        'title'          => 'Document Types',
        'title_singular' => 'Document Type',
        'fields'         => [
            'docuType_id'                 => 'ID',
            'docuType_id_helper'          => '',
            'docuType_name'               => 'Name',
            'docuType_name_helper'        => '',
            'docuType_document'           => 'Document',
            'docuType_document_helper'    => '',
            'docuType_createdAt'          => 'Created at',
            'docuType_createdAt_helper'   => '',
            'docuType_updatedAt'          => 'Updated at',
            'docuType_updatedAt_helper'   => '',
            'docuType_deletedAt'          => 'Deleted at',
            'docuType_deletedAt_helper'   => '',
        ],
    ],
    'gradesheet'           => [
        'title'          => 'Gradesheets',
        'title_singular' => 'Gradesheet'
    ],
    'gradesheetPage'           => [
        'title'          => 'Gradesheets',
        'title_singular' => 'Gradesheet',
        'fields'         => [
            'grdsheetpg_id'                 => 'ID',
            'grdsheetpg_id_helper'          => '',
            'grdsheetpg_pgNo'               => 'Page No.',
            'grdsheetpg_pgNo_helper'        => '',
            'grdsheetpg_flink'              => 'File Link',
            'grdsheetpg_flink_helper'       => '',
            'grdsheetpg_fname'              => 'File Name',
            'grdsheetpg_fname_helper'       => '',
            'grdsheetpg_createdAt'          => 'Created at',
            'grdsheetpg_createdAt_helper'   => '',
            'grdsheetpg_updatedAt'          => 'Updated at',
            'grdsheetpg_updatedAt_helper'   => '',
            'grdsheetpg_deletedAt'          => 'Deleted at',
            'grdsheetpg_deletedAt_helper'   => '',
        ],
    ],
    'room'           => [
        'title'          => 'Rooms',
        'title_singular' => 'Room',
        'fields'         => [
            'room_id'                 => 'ID',
            'room_id_helper'          => '',
            'room_name'              => 'Name',
            'room_name_helper'       => '',
            'room_createdAt'         => 'Created at',
            'room_createdAt_helper'  => '',
            'room_updatedAt'         => 'Updated at',
            'room_updatedAt_helper'  => '',
            'room_deletedAt'         => 'Deleted at',
            'room_deletedAt_helper'  => '',
        ],
    ],
    'subject'           => [
        'title'          => 'Subjects',
        'title_singular' => 'Subject',
        'fields'         => [
            'subj_id'                 => 'ID',
            'subj_id_helper'          => '',
            'subj_code'               => 'Code',
            'subj_code_helper'        => '',
            'subj_name'               => 'Name',
            'subj_name_helper'        => '',
            'subj_units'              => 'Units',
            'subj_units_helper'       => '',
            'subj_createdAt'          => 'Created at',
            'subj_createdAt_helper'   => '',
            'subj_updatedAt'          => 'Updated at',
            'subj_updatedAt_helper'   => '',
            'subj_deletedAt'          => 'Deleted at',
            'subj_deletedAt_helper'   => '',
        ],
    ],

];
