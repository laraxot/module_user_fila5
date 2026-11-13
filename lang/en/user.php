<?php

declare(strict_types=1);

return [
    'actions' => [
        'attach_user' => 'Attach User',
        'associate_user' => 'Associate User',
        'user_actions' => 'User Actions',
        'view' => 'View',
        'edit' => 'Edit',
        'detach' => 'Detach',
        'edit_tooltip' => 'Edit',
        'detach_tooltip' => 'Detach',
        'row_actions' => 'Actions',
        'delete_selected' => 'Delete Selected',
        'confirm_detach' => 'Are you sure you want to detach this user?',
        'confirm_delete' => 'Are you sure you want to delete the selected users?',
        'success_attached' => 'User successfully attached',
        'success_detached' => 'User successfully detached',
        'success_deleted' => 'Users successfully deleted',
        'toggle_layout' => 'Toggle Layout',
        'create' => 'Create User',
        'delete' => 'Delete User',
        'associate' => 'Associate User',
        'bulk_delete' => 'Delete Selected',
        'bulk_detach' => 'Detach Selected',
        'impersonate' => 'Impersonate User',
        'stop_impersonating' => 'Stop Impersonating',
        'block' => 'Block',
        'unblock' => 'Unblock',
        'send_reset_link' => 'Send Password Reset Link',
        'verify_email' => 'Verify Email',
        'attach_role' => 'Assign Role',
        'change_password' => 'Change password',
    ],
    'fields' => [
        'name' => [
<<<<<<< .merge_file_dwtFf5
            'label' => 'First name',
            'placeholder' => 'Enter the first name',
            'description' => 'name',
=======
            'label' => 'Nome',
            'placeholder' => 'Inserisci il nome',
>>>>>>> .merge_file_H7nERp
            'helper_text' => '',
            'tooltip' => '',
        ],
        'email' => [
            'label' => 'Email',
<<<<<<< .merge_file_dwtFf5
            'placeholder' => 'Enter the email',
            'description' => 'email',
=======
            'placeholder' => 'Inserisci l\'email',
>>>>>>> .merge_file_H7nERp
            'helper_text' => '',
        ],
        'password' => [
            'label' => 'Password',
<<<<<<< .merge_file_dwtFf5
            'placeholder' => 'Enter the password',
            'description' => 'password',
=======
            'placeholder' => 'Inserisci la password',
>>>>>>> .merge_file_H7nERp
            'helper_text' => '',
            'tooltip' => '',
        ],
        'password_confirmation' => [
            'label' => 'Confirm Password',
            'placeholder' => 'Confirm the password',
        ],
        'current_password' => [
            'label' => 'Current Password',
            'placeholder' => 'Enter the current password',
        ],
        'status' => [
            'label' => 'Status',
            'options' => [
                'active' => 'Active',
                'inactive' => 'Inactive',
                'blocked' => 'Blocked',
            ],
        ],
    ],
    'filters' => [
        'active_users' => 'Active Users',
        'creation_date' => 'Creation Date',
        'date_from' => 'From',
        'date_to' => 'To',
        'verified' => 'Verified Users',
        'unverified' => 'Unverified Users',
    ],
    'messages' => [
        'no_records' => 'No users found',
        'loading' => 'Loading users...',
        'search' => 'Search users...',
        'credentials_incorrect' => 'The provided credentials are incorrect.',
        'created' => 'User created successfully',
        'updated' => 'User updated successfully',
        'deleted' => 'User deleted successfully',
        'blocked' => 'User blocked successfully',
        'unblocked' => 'User unblocked successfully',
        'reset_link_sent' => 'Password reset link sent',
        'email_verified' => 'Email verified successfully',
        'impersonating' => 'You are impersonating the user :name',
        'login_success' => 'Login successful',
        'validation_error' => 'Validation error',
        'login_error' => 'An error occurred during login. Please try again later.',
    ],
    'modals' => [
        'create' => [
            'heading' => 'Create User',
            'description' => 'Create a new user record',
            'actions' => [
                'submit' => 'Create',
                'cancel' => 'Cancel',
            ],
        ],
        'edit' => [
            'heading' => 'Edit User',
            'description' => 'Modify user information',
            'actions' => [
                'submit' => 'Save Changes',
                'cancel' => 'Cancel',
            ],
        ],
        'delete' => [
            'heading' => 'Delete User',
            'description' => 'Are you sure you want to delete this user?',
            'actions' => [
                'submit' => 'Delete',
                'cancel' => 'Cancel',
            ],
        ],
        'associate' => [
            'heading' => 'Associate User',
            'description' => 'Select a user to associate',
            'actions' => [
                'submit' => 'Associate',
                'cancel' => 'Cancel',
            ],
        ],
        'detach' => [
            'heading' => 'Detach User',
            'description' => 'Are you sure you want to detach this user?',
            'actions' => [
                'submit' => 'Detach',
                'cancel' => 'Cancel',
            ],
        ],
        'bulk_delete' => [
            'heading' => 'Delete Selected Users',
            'description' => 'Are you sure you want to delete the selected users?',
            'actions' => [
                'submit' => 'Delete Selected',
                'cancel' => 'Cancel',
            ],
        ],
        'bulk_detach' => [
            'heading' => 'Detach Selected Users',
            'description' => 'Are you sure you want to detach the selected users?',
            'actions' => [
                'submit' => 'Detach Selected',
                'cancel' => 'Cancel',
            ],
        ],
    ],
    'navigation' => [
        'name' => 'Users',
        'plural' => 'Users',
        'group' => [
            'name' => 'User management',
            'description' => 'Management of users and their permissions',
        ],
        'label' => 'Users',
        'sort' => '26',
        'icon' => 'user-main',
    ],
    'validation' => [
        'email_unique' => 'This email is already in use',
        'password_min' => 'The password must be at least :min characters',
        'password_confirmed' => 'The passwords do not match',
        'current_password' => 'The current password is incorrect',
    ],
    'permissions' => [
        'view_users' => 'View users',
        'create_users' => 'Create users',
        'edit_users' => 'Edit users',
        'delete_users' => 'Delete users',
        'impersonate_users' => 'Impersonate users',
        'manage_roles' => 'Manage roles',
    ],
    'relation_groups' => [
        'security' => [
            'label' => 'Security',
        ],
        'organization' => [
            'label' => 'Organization',
        ],
    ],
];
