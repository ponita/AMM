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


       /* COUNTRY table */
        $countryData = array(
            array("id" => \Config::get('constants.COUNTRY_ID'), 
                'name' => \Config::get('constants.COUNTRY_NAME')
                ),
            
        );

        foreach ($countryData as $country)
        {
            $country[] = Country::create($country);
        }
        $this->command->info('country seeded');
       
Country::create(['name' => 'Albania']);
Country::create(['name' => 'Algeria']);
Country::create(['name' => 'Andorra']);
Country::create(['name' => 'Angola']);
Country::create(['name' => 'Antigua and Barbuda']);
Country::create(['name' => 'Argentina']);
Country::create(['name' => 'Armenia']);
Country::create(['name' => 'Australia']);
Country::create(['name' => 'Austria']);
Country::create(['name' => 'Azerbaijan']);
Country::create(['name' => 'Bahamas']);
Country::create(['name' => 'Bahrain']);
Country::create(['name' => 'Bangladesh']);
Country::create(['name' => 'Barbados']);
Country::create(['name' => 'Belarus']);
Country::create(['name' => 'Belgium']);
Country::create(['name' => 'Belize']);
Country::create(['name' => 'Benin']);
Country::create(['name' => 'Bhutan']);
Country::create(['name' => 'Bolivia']);
Country::create(['name' => 'Bosnia and Herzegovina']);
Country::create(['name' => 'Botswana']);
Country::create(['name' => 'Brazil']);
Country::create(['name' => 'Brunei']);
Country::create(['name' => 'Bulgaria']);
Country::create(['name' => 'Burkina Faso']);
Country::create(['name' => 'Burundi']);
Country::create(['name' => 'Cabo Verde']);
Country::create(['name' => 'Cambodia']);
Country::create(['name' => 'Cameroon']);
Country::create(['name' => 'Canada']);
Country::create(['name' => 'Central African Republic (CAR)']);
Country::create(['name' => 'Chad']);
Country::create(['name' => 'Chile']);
Country::create(['name' => 'China']);
Country::create(['name' => 'Colombia']);
Country::create(['name' => 'Comoros']);
Country::create(['name' => 'Democratic Republic of the Congo']);
Country::create(['name' => 'Republic of the Congo']);
Country::create(['name' => 'Costa Rica']);
Country::create(['name' => 'Cote dIvoire']);
Country::create(['name' => 'Croatia']);
Country::create(['name' => 'Cuba']);
Country::create(['name' => 'Cyprus']);
Country::create(['name' => 'Czech Republic']);
Country::create(['name' => 'Denmark']);
Country::create(['name' => 'Djibouti']);
Country::create(['name' => 'Dominica']);
Country::create(['name' => 'Dominican Republic']);
Country::create(['name' => 'Ecuador']);
Country::create(['name' => 'Egypt']);
Country::create(['name' => 'El Salvador']);
Country::create(['name' => 'Equatorial Guinea']);
Country::create(['name' => 'Eritrea']);
Country::create(['name' => 'Estonia']);
Country::create(['name' => 'Ethiopia']);
Country::create(['name' => 'Fiji']);
Country::create(['name' => 'Finland']);
Country::create(['name' => 'France']);
Country::create(['name' => 'Gabon']);
Country::create(['name' => 'Gambia']);
Country::create(['name' => 'Georgia']);
Country::create(['name' => 'Germany']);
Country::create(['name' => 'Ghana']);
Country::create(['name' => 'Greece']);
Country::create(['name' => 'Grenada']);
Country::create(['name' => 'Guatemala']);
Country::create(['name' => 'Guinea']);
Country::create(['name' => 'Guinea-Bissau']);
Country::create(['name' => 'Guyana']);
Country::create(['name' => 'Haiti']);
Country::create(['name' => 'Honduras']);
Country::create(['name' => 'Hungary']);
Country::create(['name' => 'Iceland']);
Country::create(['name' => 'India']);
Country::create(['name' => 'Indonesia']);
Country::create(['name' => 'Iran']);
Country::create(['name' => 'Iraq']);
Country::create(['name' => 'Ireland']);
Country::create(['name' => 'Israel']);
Country::create(['name' => 'Italy']);
Country::create(['name' => 'Jamaica']);
Country::create(['name' => 'Japan']);
Country::create(['name' => 'Jordan']);
Country::create(['name' => 'Kazakhstan']);
Country::create(['name' => 'Kenya']);
Country::create(['name' => 'Kiribati']);
Country::create(['name' => 'Kosovo']);
Country::create(['name' => 'Kuwait']);
Country::create(['name' => 'Kyrgyzstan']);
Country::create(['name' => 'Laos']);
Country::create(['name' => 'Latvia']);
Country::create(['name' => 'Lebanon']);
Country::create(['name' => 'Lesotho']);
Country::create(['name' => 'Liberia']);
Country::create(['name' => 'Libya']);
Country::create(['name' => 'Liechtenstein']);
Country::create(['name' => 'Lithuania']);
Country::create(['name' => 'Luxembourg']);
Country::create(['name' => 'Macedonia (FYROM)']);
Country::create(['name' => 'Madagascar']);
Country::create(['name' => 'Malawi']);
Country::create(['name' => 'Malaysia']);
Country::create(['name' => 'Maldives']);
Country::create(['name' => 'Mali']);
Country::create(['name' => 'Malta']);
Country::create(['name' => 'Marshall Islands']);
Country::create(['name' => 'Mauritania']);
Country::create(['name' => 'Mauritius']);
Country::create(['name' => 'Mexico']);
Country::create(['name' => 'Micronesia']);
Country::create(['name' => 'Moldova']);
Country::create(['name' => 'Monaco']);
Country::create(['name' => 'Mongolia']);
Country::create(['name' => 'Montenegro']);
Country::create(['name' => 'Morocco']);
Country::create(['name' => 'Mozambique']);
Country::create(['name' => 'Myanmar (Burma)']);
Country::create(['name' => 'Namibia']);
Country::create(['name' => 'Nauru']);
Country::create(['name' => 'Nepal']);
Country::create(['name' => 'Netherlands']);
Country::create(['name' => 'New Zealand']);
Country::create(['name' => 'Nicaragua']);
Country::create(['name' => 'Niger']);
Country::create(['name' => 'Nigeria']);
Country::create(['name' => 'North Korea']);
Country::create(['name' => 'Norway']);
Country::create(['name' => 'Oman']);
Country::create(['name' => 'Pakistan']);
Country::create(['name' => 'Palau']);
Country::create(['name' => 'Palestine']);
Country::create(['name' => 'Panama']);
Country::create(['name' => 'Papua New Guinea']);
Country::create(['name' => 'Paraguay']);
Country::create(['name' => 'Peru']);
Country::create(['name' => 'Philippines']);
Country::create(['name' => 'Poland']);
Country::create(['name' => 'Portugal']);
Country::create(['name' => 'Qatar']);
Country::create(['name' => 'Romania']);
Country::create(['name' => 'Russia']);
Country::create(['name' => 'Rwanda']);
Country::create(['name' => 'Saint Kitts and Nevis']);
Country::create(['name' => 'Saint Lucia']);
Country::create(['name' => 'Saint Vincent and the Grenadines']);
Country::create(['name' => 'Samoa']);
Country::create(['name' => 'San Marino']);
Country::create(['name' => 'Sao Tome and Principe']);
Country::create(['name' => 'Saudi Arabia']);
Country::create(['name' => 'Senegal']);
Country::create(['name' => 'Serbia']);
Country::create(['name' => 'Seychelles']);
Country::create(['name' => 'Sierra Leone']);
Country::create(['name' => 'Singapore']);
Country::create(['name' => 'Slovakia']);
Country::create(['name' => 'Slovenia']);
Country::create(['name' => 'Solomon Islands']);
Country::create(['name' => 'Somalia']);
Country::create(['name' => 'South Africa']);
Country::create(['name' => 'South Korea']);
Country::create(['name' => 'South Sudan']);
Country::create(['name' => 'Spain']);
Country::create(['name' => 'Sri Lanka']);
Country::create(['name' => 'Sudan']);
Country::create(['name' => 'Suriname']);
Country::create(['name' => 'Swaziland']);
Country::create(['name' => 'Sweden']);
Country::create(['name' => 'Switzerland']);
Country::create(['name' => 'Syria']);
Country::create(['name' => 'Taiwan']);
Country::create(['name' => 'Tajikistan']);
Country::create(['name' => 'Tanzania']);
Country::create(['name' => 'Thailand']);
Country::create(['name' => 'Timor-Leste']);
Country::create(['name' => 'Togo']);
Country::create(['name' => 'Tonga']);
Country::create(['name' => 'Trinidad and Tobago']);
Country::create(['name' => 'Tunisia']);
Country::create(['name' => 'Turkey']);
Country::create(['name' => 'Turkmenistan']);
Country::create(['name' => 'Tuvalu']);
Country::create(['name' => 'Uganda']);
Country::create(['name' => 'Ukraine']);
Country::create(['name' => 'United Arab Emirates (UAE)']);
Country::create(['name' => 'United Kingdom (UK)']);
Country::create(['name' => 'United States of America (USA)']);
Country::create(['name' => 'Uruguay']);
Country::create(['name' => 'Uzbekistan']);
Country::create(['name' => 'Vanuatu']);
Country::create(['name' => 'Vatican City (Holy See)']);
Country::create(['name' => 'Venezuela']);
Country::create(['name' => 'Vietnam']);
Country::create(['name' => 'Yemen']);
Country::create(['name' => 'Zambia']);
Country::create(['name' => 'Zimbabwe']);

        $this->command->info('Other country seeded');

        /* Users table */
        $usersData = array(
            array(
                "username" => "ublis_admin", "password" => Hash::make("password"), 
                "email" => "", "name" => "Web Administrator", "designation" => "Programmer"
                
            ),
        );

        foreach ($usersData as $user)
        {
            $users[] = User::create($user);
        }
        $this->command->info('users seeded');


        
       /* Audience table */
        $audiencedata = array(
            array("id" => \Config::get('constants.AUDIENCE_ID'), 
                'name' => \Config::get('constants.AUDIENCE_NAME')
                ),
            
        );

        foreach ($audiencedata as $audience)
        {
            $audience[] = AudienceData::create($audience);
        }
        $this->command->info('Audience seeded');

            AudienceData::create(['name' => 'IPs']);
            AudienceData::create(['name' => 'Devt Partners']);
            AudienceData::create(['name' => 'DHOs']);
            AudienceData::create(['name' => 'RRH Directors']);
            AudienceData::create(['name' => 'IP Lab Advisors']);
            AudienceData::create(['name' => 'Lab Incharges']);
            AudienceData::create(['name' => 'Medical Superintendents']);
            AudienceData::create(['name' => 'DLFPs']);
            AudienceData::create(['name' => 'Multi sectoral']);
            AudienceData::create(['name' => 'National stakeholders']);
            AudienceData::create(['name' => 'Regional Coordinators']);
            AudienceData::create(['name' => 'Hub Coordinators']);
            AudienceData::create(['name' => 'Top Management']);
            AudienceData::create(['name' => 'Senior Management']);
            AudienceData::create(['name' => 'M$E Focal Persons']);
            AudienceData::create(['name' => 'General Staff']);
            AudienceData::create(['name' => 'Departmental']);
            AudienceData::create(['name' => 'Hospital Directors']);
            AudienceData::create(['name' => 'Others']);
        
        $this->command->info('Audience seeded');

        /* Facilities table */
        $facilitiesdata = array(
            array("id" => \Config::get('constants.FACILITIES_ID'), 
                'name' => \Config::get('constants.FACILITIES_NAME')
                ),
            
        );

        // foreach ($facilitiesdata as $facilities)
        // {
        //     $facilities[] = Facility::create($facilities);
        // }
        // $this->command->info('Facilities seeded');

        //     Facility::create(['name' => 'IPs']);
        //     Facility::create(['name' => 'Devt Partners']);
        //     Facility::create(['name' => 'DHOs']);
        //     Facility::create(['name' => 'RRH Directors']);
        //     Facility::create(['name' => 'IP Lab Advisors']);
        //     Facility::create(['name' => 'Lab Incharges']);
        //     Facility::create(['name' => 'Medical Superintendents']);
        //     Facility::create(['name' => 'DLFPs']);
        //     Facility::create(['name' => 'Multi sectoral']);
        //     Facility::create(['name' => 'National stakeholders']);
        //     Facility::create(['name' => 'Regional Coordinators']);
        //     Facility::create(['name' => 'Hub Coordinators']);
        //     Facility::create(['name' => 'Top Management']);
        //     Facility::create(['name' => 'Senior Management']);
        //     Facility::create(['name' => 'M$E Focal Persons']);
        //     Facility::create(['name' => 'General Staff']);
        //     Facility::create(['name' => 'Departmental']);
        //     Facility::create(['name' => 'Hospital Directors']);
        //     Facility::create(['name' => 'Others']);
        
        // $this->command->info('Facilities seeded');

        // /* Department table */
        // $departmentdata = array(
        //     array("id" => \Config::get('constants.AUDIENCE_ID'), 
        //         'name' => \Config::get('constants.AUDIENCE_NAME')
        //         ),
            
        // );

        // foreach ($departmentdata as $department)
        // {
        //     $department[] = Department::create($department);
        // }
        // $this->command->info('Department seeded');

        //     Department::create(['name' => 'IPs']);
           
        
        // $this->command->info('Department seeded'); 
     

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
            // array("name" => "display_activities", "display_name" => "Can manage activity"),
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

            // array("name" => "display_meeting", "display_name" => "Can manage meeting"),
            array("name" => "view_meeting", "display_name" => "Can view meeting details"),
            array("name" => "manage_meeting", "display_name" => "Can add a meeting"),
            array("name" => "edit_meeting", "display_name" => "Can edit meeting details"),
            array("name" => "approve_meeting", "display_name" => "Can approve meeting"),
            array("name" => "add_meeting_ap", "display_name" => "Add meeting actionpoints"),
            array("name" => "add_minutes", "display_name" => "Can attach minutes"),
            array("name" => "download_minutes", "display_name" => "Can download minutes"),

            // array("name" => "display_memo", "display_name" => "Can manage memo"),
            array("name" => "view_memo", "display_name" => "Can view memo details"),
            array("name" => "manage_memo", "display_name" => "Can add a memo"),
            array("name" => "edit_memo", "display_name" => "Can edit memo details"), 
            array("name" => "approve_memo", "display_name" => "Can approve memo"),
            
            // array("name" => "display_invitation", "display_name" => "Can manage invitation"),
            array("name" => "view_invitation", "display_name" => "Can view invitation details"),
            array("name" => "manage_invitation", "display_name" => "Can add an invitation"),
            array("name" => "approve_invitation", "display_name" => "Can approve invitation"),
            array("name" => "download_invitation", "display_name" => "Can download invitation"),

            array("name" => "view_leave_form", "display_name" => "Can view leave pages"),
            array("name" => "supervisor_leave_approval", "display_name" => "Supervisor approval of leave form"),
            array("name" => "manager_leave_approval", "display_name" => "Manager approval of leave form"),
            array("name" => "head_leave_approval", "display_name" => "Head approval of leave form"),
            array("name" => "view_leave_details", "display_name" => "Can view Leave details"),
            array("name" => "manage_templates", "display_name" => "Manage templates"),

            array("name" => "edit_info", "display_name" => "Edit user info"),
            array("name" => "edit_password", "display_name" => "Edit password"),
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