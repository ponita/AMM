<?php

class TestDataSeeder extends DatabaseSeeder
{
    public function run()
    {
        /* DISTRICT table */
        $districtsData = array(
            array("id" => \Config::get('constants.DISTRICT_ID'), 
                'name' => \Config::get('constants.DISTRICT_NAME')
                ),
            
        );

        foreach ($districtsData as $district)
        {
            $districts[] = District::create($district);
        }
        $this->command->info('Districts seeded');
        
        District::create(['name' => 'Buikwe']);
        District::create(['name' => 'Bukomansimbi']);
        District::create(['name' => 'Butambala']);
        District::create(['name' => 'Buvuma']);
        District::create(['name' => 'Gomba']);
        District::create(['name' => 'Kalangala']);
        District::create(['name' => 'Kalungu']);
        District::create(['name' => 'Kayunga']);
        District::create(['name' => 'Kiboga']);
        District::create(['name' => 'Kyankwanzi']);
        District::create(['name' => 'Luweero']);
        District::create(['name' => 'Lwengo']);
        District::create(['name' => 'Lyantonde']);
        District::create(['name' => 'Masaka']);
        District::create(['name' => 'Mityana']);
        District::create(['name' => 'Mpigi']);
        District::create(['name' => 'Mubende']);
        District::create(['name' => 'Mukono']);
        District::create(['name' => 'Nakaseke']);
        District::create(['name' => 'Nakasongola']);
        District::create(['name' => 'Rakai']);
        District::create(['name' => 'Ssembabule']);
        District::create(['name' => 'Wakiso']);
        District::create(['name' => 'Amuria']);
        District::create(['name' => 'Budaka']);
        District::create(['name' => 'Bududa']);
        District::create(['name' => 'Bugiri']);
        District::create(['name' => 'Bukedea']);
        District::create(['name' => 'Bukwa']);
        District::create(['name' => 'Bulambuli']);
        District::create(['name' => 'Busia']);
        District::create(['name' => 'Butaleja']);
        District::create(['name' => 'Buyende']);
        District::create(['name' => 'Iganga']);
        District::create(['name' => 'Jinja']);
        District::create(['name' => 'Kaberamaido']);
        District::create(['name' => 'Kaliro']);
        District::create(['name' => 'Kamuli']);
        District::create(['name' => 'Kapchorwa']);
        District::create(['name' => 'Katakwi']);
        District::create(['name' => 'Kibuku']);
        District::create(['name' => 'Kumi']);
        District::create(['name' => 'Kween']);
        District::create(['name' => 'Luuka']);
        District::create(['name' => 'Manafwa']);
        District::create(['name' => 'Mayuge']);
        District::create(['name' => 'Mbale']);
        District::create(['name' => 'Namayingo']);
        District::create(['name' => 'Namutumba']);
        District::create(['name' => 'Ngora']);
        District::create(['name' => 'Pallisa']);
        District::create(['name' => 'Serere']);
        District::create(['name' => 'Sironko']);
        District::create(['name' => 'Soroti']);
        District::create(['name' => 'Tororo']);
        District::create(['name' => 'Abim']);
        District::create(['name' => 'Adjumani']);
        District::create(['name' => 'Agago']);
        District::create(['name' => 'Alebtong']);
        District::create(['name' => 'Amolatar']);
        District::create(['name' => 'Amudat']);
        District::create(['name' => 'Amuru']);
        District::create(['name' => 'Apac']);
        District::create(['name' => 'Arua']);
        District::create(['name' => 'Dokolo']);
        District::create(['name' => 'Gulu']);
        District::create(['name' => 'Kaabong']);
        District::create(['name' => 'Kitgum']);
        District::create(['name' => 'Koboko']);
        District::create(['name' => 'Kole']);
        District::create(['name' => 'Kotido']);
        District::create(['name' => 'Lamwo']);
        District::create(['name' => 'Lira']);
        District::create(['name' => 'Maracha']);
        District::create(['name' => 'Moroto']);
        District::create(['name' => 'Moyo']);
        District::create(['name' => 'Nakapiripirit']);
        District::create(['name' => 'Napak']);
        District::create(['name' => 'Nebbi']);
        District::create(['name' => 'Nwoya']);
        District::create(['name' => 'Otuke']);
        District::create(['name' => 'Oyam']);
        District::create(['name' => 'Pader']);
        District::create(['name' => 'Yumbe']);
        District::create(['name' => 'Zombo']);
        District::create(['name' => 'Buhweju']);
        District::create(['name' => 'Buliisa']);
        District::create(['name' => 'Bundibugyo']);
        District::create(['name' => 'Bushenyi']);
        District::create(['name' => 'Hoima']);
        District::create(['name' => 'Ibanda']);
        District::create(['name' => 'Isingiro']);
        District::create(['name' => 'Kabale']);
        District::create(['name' => 'Kabarole']);
        District::create(['name' => 'Kamwenge']);
        District::create(['name' => 'Kanungu']);
        District::create(['name' => 'Kasese']);
        District::create(['name' => 'Kibaale']);
        District::create(['name' => 'Kiruhura']);
        District::create(['name' => 'Kiryandongo']);
        District::create(['name' => 'Kisoro']);
        District::create(['name' => 'Kyegegwa']);
        District::create(['name' => 'Kyenjojo']);
        District::create(['name' => 'Masindi']);
        District::create(['name' => 'Mbarara']);
        District::create(['name' => 'Mitooma']);
        District::create(['name' => 'Ntoroko']);
        District::create(['name' => 'Ntungamo']);
        District::create(['name' => 'Rubirizi']);
        District::create(['name' => 'Rukungiri']);
        District::create(['name' => 'Sheema']);
        District::create(['name' => 'Omoro']);
        District::create(['name' => 'Kagadi']);
        District::create(['name' => 'Kakumiro']);
        District::create(['name' => 'Rubanda']);
        District::create(['name' => 'Bukwo']);
        $this->command->info('Other Districts seeded');


       

        /* Users table */
        $usersData = array(
            array(
                "username" => "ublis_admin", "password" => Hash::make("password"), 
                "email" => "", "name" => "UBLIS Administrator", "designation" => "Programmer"
                
            ),
        );

        foreach ($usersData as $user)
        {
            $users[] = User::create($user);
        }
        $this->command->info('users seeded');



        // /* Audience table */
        // $audiencedata = array(
        //     array("audience" => "IPs"),
        //     array("audience" => "Dev't Partners"),
        //     array("audience" => "DHOs"),
        //     array("audience" => "RRH Directors"),
        //     array("audience" => "IP Lab Advisors"),
        //     array("audience" => "Lab Incharges"),
        //     array("audience" => "Medical Superintendents"),
        //     array("audience" => "DLFPs"),
        //     array("audience" => "Multi sectoral"),
        //     array("audience" => "National stakeholders"),
        //     array("audience" => "Regional Coordinators"),
        //     array("audience" => "Hub Coordinators"),
        //     array("audience" => "Top Management"),
        //     array("audience" => "Senior Management"),
        //     array("audience" => "M$E Focal Persons"),
        //     array("audience" => "General Staff"),
        //     array("audience" => "Departmental"),
            
        // );

        // foreach ($audiencedata as $audience)
        // {
        //     $audience[] = Audience::create($audience);
        // }
        // $this->command->info('Audience seeded');
        
        
     

        //        /* Test table */
        // UnhlsTest::create(
        //     array(
                
        //         "event_status_id" => UnhlsTest::NOT_RECEIVED,
        //         "requested_by" => "Dr. Abou Meyang",
        //         "created_by" => $users[rand(0, count($users)-1)]->id,
        //     )
        // );

        // UnhlsTest::create(
        //     array(
                
        //         "event_status_id" => UnhlsTest::PENDING,
        //         "requested_by" => "Dr. Abou Meyang",
        //         "created_by" => $users[rand(0, count($users)-1)]->id,
        //     )
        // );

       

        // $test_gxm_accepted_completed = UnhlsTest::create(
        //     array(
        //         "visit_id" => $visits[rand(0,count($visits)-1)]->id,
        //         "test_type_id" => $testTypeGXM->id,
        //         "specimen_id" => $this->createSpecimen(
        //                 UnhlsTest::COMPLETED, UnhlsSpecimen::ACCEPTED,
        //                 SpecimenType::all()->last()->id,
        //                 $users[rand(0, count($users)-1)]->id),
        //         "interpretation" => "Perfect match.",
        //         "event_status_id" => UnhlsTest::COMPLETED,
        //         "created_by" => $users[rand(0, count($users)-1)]->id,
        //         "tested_by" => $users[rand(0, count($users)-1)]->id,
        //         "requested_by" => "Dr. Abou Meyang",
        //         "time_started" => $now->format('Y-m-d H:i:s'),
        //         "time_completed" => $now->add(new DateInterval('PT12M8S'))->format('Y-m-d H:i:s'),
        //     )
        // );

        // $test_hb_accepted_completed = UnhlsTest::create(
        //     array(
        //         "visit_id" => $visits[rand(0,count($visits)-1)]->id,
        //         "test_type_id" => $testTypeHB->id,
        //         "specimen_id" => $this->createSpecimen(
        //                 UnhlsTest::COMPLETED, UnhlsSpecimen::ACCEPTED,
        //                 SpecimenType::all()->last()->id,
        //                 $users[rand(0, count($users)-1)]->id),
        //         "interpretation" => "Do nothing!",
        //         "event_status_id" => UnhlsTest::COMPLETED,
        //         "created_by" => $users[rand(0, count($users)-1)]->id,
        //         "tested_by" => $users[rand(0, count($users)-1)]->id,
        //         "requested_by" => "Genghiz Khan",
        //         "time_started" => $now->format('Y-m-d H:i:s'),
        //         "time_completed" => $now->add(new DateInterval('PT5M23S'))->format('Y-m-d H:i:s'),
        //     )
        // );

        // $tests_accepted_started = UnhlsTest::create(
        //     array(
        //         "visit_id" => $visits[rand(0,count($visits)-1)]->id,
        //         "test_type_id" => $testTypeGXM->id,
        //         "specimen_id" => $this->createSpecimen(
        //             UnhlsTest::STARTED, UnhlsSpecimen::ACCEPTED, SpecimenType::all()->last()->id,
        //             $users[rand(0, count($users)-1)]->id),
        //         "event_status_id" => UnhlsTest::STARTED,
        //         "requested_by" => "Dr. Abou Meyang",
        //         "created_by" => $users[rand(0, count($users)-1)]->id,
        //         "time_started" => $now->format('Y-m-d H:i:s'),
        //     )
        // );

        // $tests_accepted_completed = UnhlsTest::create(
        //     array(
        //         "visit_id" => $visits[rand(0,count($visits)-1)]->id,
        //         "test_type_id" => $testTypeBS->id,//BS for MPS
        //         "specimen_id" => $this->createSpecimen(
        //                 UnhlsTest::COMPLETED, UnhlsSpecimen::ACCEPTED,
        //                 SpecimenType::all()->last()->id,
        //                 $users[rand(0, count($users)-1)]->id),
        //         "interpretation" => "Positive",
        //         "event_status_id" => UnhlsTest::COMPLETED,
        //         "created_by" => $users[rand(0, count($users)-1)]->id,
        //         "tested_by" => $users[rand(0, count($users)-1)]->id,
        //         "requested_by" => "Ariel Smith",
        //         "time_started" => $now->format('Y-m-d H:i:s'),
        //         "time_completed" => $now->add(new DateInterval('PT7M34S'))->format('Y-m-d H:i:s'),
        //     )
        // );

        // $tests_accepted_verified = UnhlsTest::create(
        //     array(
        //         "visit_id" => $visits[rand(0,count($visits)-1)]->id,
        //         "test_type_id" => $testTypeBS->id,//BS for MPS
        //         "specimen_id" => $this->createSpecimen(
        //                 UnhlsTest::VERIFIED, UnhlsSpecimen::ACCEPTED,
        //                 SpecimenType::all()->last()->id,
        //                 $users[rand(0, count($users)-1)]->id),
        //         "interpretation" => "Very high concentration of parasites.",
        //         "event_status_id" => UnhlsTest::VERIFIED,
        //         "created_by" => $users[rand(0, count($users)-1)]->id,
        //         "tested_by" => $users[rand(0, count($users)-1)]->id,
        //         "verified_by" => $users[rand(0, count($users)-1)]->id,
        //         "requested_by" => "Genghiz Khan",
        //         "time_started" => $now,
        //         "time_completed" => $now->add(new DateInterval('PT5M17S'))->format('Y-m-d H:i:s'),
        //         "time_verified" => $now->add(new DateInterval('PT112M33S'))->format('Y-m-d H:i:s'),
        //     )
        // );

        // $tests_rejected_pending = UnhlsTest::create(
        //     array(
        //         "visit_id" => $visits[rand(0,count($visits)-1)]->id,
        //         "test_type_id" => $testTypeBS->id,//BS for MPS
        //         "specimen_id" => $this->createSpecimen(
        //                 UnhlsTest::PENDING, UnhlsSpecimen::REJECTED,
        //                 SpecimenType::all()->last()->id,
        //                 $users[rand(0, count($users)-1)]->id,
        //                 $users[rand(0, count($users)-1)]->id,
        //                 $rejection_reasons[rand(0,count($rejection_reasons)-1)]->id),
        //         "event_status_id" => UnhlsTest::PENDING,
        //         "requested_by" => "Dr. Abou Meyang",
        //         "created_by" => $users[rand(0, count($users)-1)]->id,
        //         "time_started" => $now->format('Y-m-d H:i:s'),
        //     )
        // );

        // //  WBC Started
        // UnhlsTest::create(
        //     array(
        //         "visit_id" => $visits[rand(0,count($visits)-1)]->id,
        //         "test_type_id" => $testTypeWBC->id,
        //         "specimen_id" => $this->createSpecimen(
        //                 UnhlsTest::STARTED, UnhlsSpecimen::ACCEPTED,
        //                 SpecimenType::all()->last()->id,
        //                 $users[rand(0, count($users)-1)]->id),
        //         "event_status_id" => UnhlsTest::PENDING,
        //         "requested_by" => "Fred Astaire",
        //         "created_by" => $users[rand(0, count($users)-1)]->id,
        //     )
        // );

        // $tests_rejected_started = UnhlsTest::create(
        //     array(
        //         "visit_id" => $visits[rand(0,count($visits)-1)]->id,
        //         "test_type_id" => $testTypeBS->id,//BS for MPS
        //         "specimen_id" => $this->createSpecimen(
        //                 UnhlsTest::STARTED, UnhlsSpecimen::REJECTED,
        //                 SpecimenType::all()->last()->id,
        //                 $users[rand(0, count($users)-1)]->id,
        //                 $users[rand(0, count($users)-1)]->id,
        //                 $rejection_reasons[rand(0,count($rejection_reasons)-1)]->id),
        //         "event_status_id" => UnhlsTest::STARTED,
        //         "created_by" => $users[rand(0, count($users)-1)]->id,
        //         "requested_by" => "Bony Em",
        //         "time_started" => $now->format('Y-m-d H:i:s'),
        //     )
        // );

        // $tests_rejected_completed = UnhlsTest::create(
        //     array(
        //         "visit_id" => $visits[rand(0,count($visits)-1)]->id,
        //         "test_type_id" => $testTypeBS->id,//BS for MPS
        //         "specimen_id" => $this->createSpecimen(
        //                 UnhlsTest::COMPLETED, UnhlsSpecimen::REJECTED,
        //                 SpecimenType::all()->last()->id,
        //                 $users[rand(0, count($users)-1)]->id,
        //                 $users[rand(0, count($users)-1)]->id,
        //                 $rejection_reasons[rand(0,count($rejection_reasons)-1)]->id),
        //         "interpretation" => "Budda Boss",
        //         "event_status_id" => UnhlsTest::COMPLETED,
        //         "created_by" => $users[rand(0, count($users)-1)]->id,
        //         "tested_by" => $users[rand(0, count($users)-1)]->id,
        //         "requested_by" => "Ed Buttler",
        //         "time_started" => $now->format('Y-m-d H:i:s'),
        //         "time_completed" => $now->add(new DateInterval('PT30M4S'))->format('Y-m-d H:i:s'),
        //     )
        // );

        // UnhlsTest::create(
        //     array(
        //         "visit_id" => $visits[rand(0,count($visits)-1)]->id,
        //         "test_type_id" => $testTypeUrinalysis->id,
        //         "specimen_id" => $this->createSpecimen(
        //                 UnhlsTest::PENDING, UnhlsSpecimen::NOT_COLLECTED,
        //                 SpecimenType::all()->last()->id,
        //                 $users[rand(0, count($users)-1)]->id),
        //         "event_status_id" => UnhlsTest::PENDING,
        //         "requested_by" => "Dr. Abou Meyang",
        //         "created_by" => $users[rand(0, count($users)-1)]->id,
        //     )
        // );

        // UnhlsTest::create(
        //     array(
        //         "visit_id" => $visits[rand(0,count($visits)-1)]->id,
        //         "test_type_id" => $testTypeWBC->id,
        //         "specimen_id" => $this->createSpecimen(
        //                 UnhlsTest::PENDING, UnhlsSpecimen::NOT_COLLECTED,
        //                 SpecimenType::all()->last()->id,
        //                 $users[rand(0, count($users)-1)]->id),
        //         "event_status_id" => UnhlsTest::PENDING,
        //         "requested_by" => "Dr. Abou Meyang",
        //         "created_by" => $users[rand(0, count($users)-1)]->id,
        //     )
        // );

        // $test_urinalysis_accepted_completed = UnhlsTest::create(
        //     array(
        //         "visit_id" => $visits[rand(0,count($visits)-1)]->id,
        //         "test_type_id" => $testTypeUrinalysis->id,
        //         "specimen_id" => $this->createSpecimen(
        //                 UnhlsTest::COMPLETED, UnhlsSpecimen::ACCEPTED,
        //                 SpecimenType::all()->last()->id,
        //                 $users[rand(0, count($users)-1)]->id),
        //         "interpretation" => "Whats this !!!! ###%%% ^ *() /",
        //         "event_status_id" => UnhlsTest::COMPLETED,
        //         "created_by" => $users[rand(0, count($users)-1)]->id,
        //         "tested_by" => $users[rand(0, count($users)-1)]->id,
        //         "requested_by" => "Dr. Abou Meyang",
        //         "time_started" => $now->format('Y-m-d H:i:s'),
        //         "time_completed" => $now->add(new DateInterval('PT12M8S'))->format('Y-m-d H:i:s'),
        //     )
        // );

        // $this->command->info('tests seeded');

        

        
        /* Permissions table */
        $permissions = array(
            array("name" => "view_activities", "display_name" => "Can view activity details"),
            array("name" => "manage_activities", "display_name" => "Can add an activity"),
            array("name" => "edit_activity", "display_name" => "Can edit activity details"),
            array("name" => "approve_activity", "display_name" => "Can approve activity"),
            array("name" => "update_objective", "display_name" => "Can add objective"),
            array("name" => "update_lessons", "display_name" => "Can add lessons learnt"),
            array("name" => "update_recommendations", "display_name" => "Can add recommendations"),
            array("name" => "update_actions", "display_name" => "Can add actions taken"),
            array("name" => "add_report", "display_name" => "Can attach report"),
            array("name" => "download_report", "display_name" => "Can download report"),

            array("name" => "view_meeting", "display_name" => "Can view meeting details"),
            array("name" => "manage_meeting", "display_name" => "Can add a meeting"),
            array("name" => "edit_meeting", "display_name" => "Can edit meeting details"),
            array("name" => "approve_meeting", "display_name" => "Can approve meeting"),
            array("name" => "add_minutes", "display_name" => "Can attach minutes"),
            array("name" => "download_minutes", "display_name" => "Can download minutes"),

            array("name" => "view_memo", "display_name" => "Can view memo details"),
            array("name" => "manage_memo", "display_name" => "Can add a memo"),
            array("name" => "edit_memo", "display_name" => "Can edit memo details"), 
            array("name" => "approve_memo", "display_name" => "Can approve memo"),
            
            array("name" => "view_invitation", "display_name" => "Can view invitation details"),
            array("name" => "manage_invitation", "display_name" => "Can add an invitation"),
            array("name" => "approve_invitation", "display_name" => "Can approve invitation"),
            array("name" => "download_invitation", "display_name" => "Can download invitation"),

            array("name" => "manage_users", "display_name" => "Can manage users"),
            array("name" => "manage_configurations", "display_name" => "Can manage configurations"),
            array("name" => "view_reports", "display_name" => "Can view reports"),
            array("name" => "request_topup", "display_name" => "Can request top-up"),
            array("name" => "manage_qc", "display_name" => "Can manage Quality Control")
        );

        foreach ($permissions as $permission) {
            Permission::create($permission);
        }
        $this->command->info('Permissions table seeded');

        /* Roles table */
        $roles = array(
            array("name" => "Superadmin"),
            array("name" => "Exec Dir"),
            array("name" => "Manager"),
            array("name" => "Secretariat")
        );
        foreach ($roles as $role) {
            Role::create($role);
        }
        $this->command->info('Roles table seeded');

        $user1 = User::find(1);
        $role1 = Role::find(1);
        $permissions = Permission::all();

        //Assign all permissions to role administrator
        foreach ($permissions as $permission) {
            $role1->attachPermission($permission);
        }
        //Assign role Administrator to user 1 administrator
        $user1->attachRole($role1);



  }
}