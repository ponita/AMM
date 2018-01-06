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



   //      /* Audience table */
   //      $audienceData = array(
   //          array("audience" => "Reported to administration for further action"),
            // array("audience" => "Referred to mental department"),
            // array("audience" => "Gave first aid (e.g. arrested bleeding)"),
            // array("audience" => "Referred to clinician for further management"),
   //          array("audience" => "Conducted risk assessment"),
   //          array("audience" => "Intervened to interrupt/arrest progress of incident (e.g. Used neutralizing agent, stopping a fight)"),
   //          array("audience" => "Disposed off broken container to designated waste bin/sharps"),
   //          array("audience" => "Patient sample taken & referred to testing lab Isolated suspected patient"),
   //          array("audience" => "Reported to or engaged national level BRM for intervention"),
   //          array("audience" => "Victim counseled"),
   //          array("audience" => "Contacted Police"),
   //          array("audience" => "Used spill kit"),
   //          array("audience" => "Administered PEP"),
   //          array("audience" => "Referred to disciplinary committee"),
   //          array("audience" => "Contained the spillage"),
   //          array("audience" => "Disinfected the place"),
   //          array("audience" => "Switched off the Electricity Mains"),
   //          array("audience" => "Washed punctured area"),
   //          array("audience" => "Others"),
   //      );

   //      foreach ($audienceData as $audience)
   //      {
   //          $audience[] = Audience::create($audience);
   //      }
   //      $this->command->info('Audience seeded');
        
        
     

        // /* Rejection Reasons table */
        // $rejection_reasons_array = array(
        //   array("reason" => "Poorly labelled"),
        //   array("reason" => "Over saturation"),
        //   array("reason" => "Insufficient Sample"),
        //   array("reason" => "Scattered"),
        //   array("reason" => "Clotted Blood"),
        //   array("reason" => "Two layered spots"),
        //   array("reason" => "Serum rings"),
        //   array("reason" => "Scratched"),
        //   array("reason" => "Haemolysis"),
        //   array("reason" => "Spots that cannot elute"),
        //   array("reason" => "Leaking"),
        //   array("reason" => "Broken Sample Container"),
        //   array("reason" => "Mismatched sample and form labelling"),
        //   array("reason" => "Missing Labels on container and tracking form"),
        //   array("reason" => "Empty Container"),
        //   array("reason" => "Samples without tracking forms"),
        //   array("reason" => "Poor transport"),
        //   array("reason" => "Lipaemic"),
        //   array("reason" => "Wrong container/Anticoagulant"),
        //   array("reason" => "Request form without samples"),
        //   array("reason" => "Missing collection date on specimen / request form."),
        //   array("reason" => "Name and signature of requester missing"),
        //   array("reason" => "Mismatched information on request form and specimen container."),
        //   array("reason" => "Request form contaminated with specimen"),
        //   array("reason" => "Duplicate specimen received"),
        //   array("reason" => "Delay between specimen collection and arrival in the laboratory"),
        //   array("reason" => "Inappropriate specimen packing"),
        //   array("reason" => "Inappropriate specimen for the test"),
        //   array("reason" => "Inappropriate test for the clinical condition"),
        //   array("reason" => "No Label"),
        //   array("reason" => "Leaking"),
        //   array("reason" => "No Sample in the Container"),
        //   array("reason" => "No Request Form"),
        //   array("reason" => "Missing Information Required"),
        // );
        // foreach ($rejection_reasons_array as $rejection_reason)
        // {
        //     $rejection_reasons[] = RejectionReason::create($rejection_reason);
        // }
        // $this->command->info('rejection_reasons seeded');

        

        
        /* Permissions table */
        $permissions = array(
            array("name" => "view_activities", "display_name" => "Can view activity details"),
            array("name" => "manage_activities", "display_name" => "Can add an activity"),
            array("name" => "edit_activity", "display_name" => "Can edit activity details"),
            array("name" => "approve_activity", "display_name" => "Can approve activity"),
            array("name" => "update_objective", "display_name" => "Can add objective"),
            array("name" => "update_lessons", "display_name" => "Can enter lessons learnt"),
            array("name" => "update_recommendations", "display_name" => "Can enter recommendations"),
            array("name" => "update_actions", "display_name" => "Can enter actions taken"),
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