<?php

use Illuminate\Database\Seeder;

class StartupsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('startups')->delete();
        
        \DB::table('startups')->insert(array (
            0 => 
            array (
                'id' => 1,
                'user_id' => 2,
                'categories_id' => 29,
                'token_id' => 'V8E4UruBXoBWc8YFk5xCCSUiBlcTU32w13CFLLI0vxuhqh66GX2iFYkp5qRUqbcdSA4Zji15cZbkrnphoKuMU0OOrZtj9yCfUGnNoYPYUanry3pqQjW6Z4xACS0Le6yu6CzMz6Z0mSP49hjCbY1NJxhW8LEmoIVNCeB3r8P4fHziYTlE5zCh8SSiVKsXjsiFpHd6l6Tz',
                'logo' => '121492889925v2zkgin04neno9b.jpg',
                'cover' => '1214928899681gbbqtpkc2ds0ky.jpg',
                'title' => 'Intupod',
                'description' => 'INTU Global Shelter (IGS) was established in 2015 to provide innovative design solutions to meet housing and shelter needs worldwide. Over the past 18 months the company has developed and prototyped products ready for market. IGS shelter products are designed to be scalable for global impact.',
                'oneliner' => 'INTU Global Shelter provides innovative design solutions to meet housing and shelter needs worldwide.',
                'website' => 'http://intupod.com',
                'twitter' => 'http://www.facebook.com',
                'facebook' => 'http://www.facebook.com',
                'linkedin' => 'http://www.facebook.com',
                'pitchdeck' => 'intupod.pdf',
                'status' => 'active',
                'goal' => 500000,
                'equity' => '20.00',
                'valuation' => 2000000,
                'tax' => 'SEIS',
                'location' => 'Belfast, Ireland',
                'finalized' => '0',
                'featured' => '1',
                'opportunity' => '1',
                'portfolio' => '0',
                'video' => 'https://www.youtube.com/embed/dhreqc-WYy8',
                'response_1' => 'Globally there are currently an estimated 65Million people displaced from their homes, 21Million of them refugees 39% are hosted in Middle East and North Africa, 29% in Africa and 6% in Europe. The average life span of a refugee camp is 14-17 years.',
                'response_2' => 'The innovation uses poly-based materials to provide a high strength structural form, which is light weight and has exceptional durability and a long lifespan (30-50years). The poly-composite core product creates safe and secure building envelopes or complete structures which are sustainable and fast',
                'response_3' => 'Housing & shelter, Disaster response, Schools, Medical clinics, Food storage, Tourism and Construction labour camps.',
                'response_4' => 'IGS objective is to achieve 200 sales in the UK and Ireland over 3 years and within that 3 year period, using our international networks identify global business partners; to provide delivery capacity under license or JV agreements to achieve international sales of up to 2800units.',
                'response_5' => 'In the UK and Ireland: IGS, branded intupod, provides multi-use accommodation units for outdoor activity, commercial or domestic use. Intupod is targeted at the Tourism, Holiday Parks, Private Land owners etc. Since November 2016 we have generated a pipeline of £300k. £55,000 is confirmed.',
                'response_6' => 'United Nations, Steel Frames Housing, ATCO / Wernick Group, Porta-Cabin, CSI Domes, Monolithic Domes, J-Domes International, Weatherhaven and Ikea.',
                'response_7' => 'INTU brings together a diverse and experienced prof. team from the construction, manufacturing and NGO sectors, including; high-performance architectural wall cladding systems, bespoke timber frame housing innovation, international project and program management, business and financial expertise.',
                'response_8' => 'Market development in UK / Working capital to deliver sales and draw down on matched grant funding / Injection mould product dev. / Modular manufacturing capacity / Development of international partners / Strategic international product placement.',
                'response_9' => 'The management team have the experience in the global market. Peter founded Habitat for Humanity in Northern Ireland and promoting housing expertise in global markets. Steve Edmondson Programme director for the $26B Masdar Green City. Innovation and technology leader for AECOM in the Middle East.',
                'response_10' => 'What is holding us back right now is the lack of funds to progress the international opportunities.',
                'response_11' => 'To become a global business through housing and shelter innovation, focussing on permanent housing for transitional communities. Our Mission is to design, develop and deliver high quality, affordable building systems to scale to help the people displaced from natural and man-made disasters',
                'created_at' => '2017-05-29 06:06:48',
                'updated_at' => '2017-05-29 06:06:48',
            ),
            1 => 
            array (
                'id' => 2,
                'user_id' => 3,
                'categories_id' => 28,
                'token_id' => '9TvthKGw1LRc6DLyQ9Y77p37MjcMxHA8yDTGFfRloLIf12u5zp3l6rCkhfUqF3pRSMSt5aeB407CIgJ7g2b1HKKcONsF2K1E45O2OWBiJyUi7bAgbw7bmBVA1mEw0RZ5m4utZiZjP8Lz7dA5n0BO892FWYwvQH5etcc0C37RFQQh86qOeR928OCwYhlVaYoRd69UKtoC',
                'logo' => '151493036408pbmlgkraqolau1h.png',
                'cover' => '151493036470ip9dfg7dferflih.jpg',
                'title' => 'Torsion Security',
                'description' => 'Torsion is an innovative cyber security company, focussed on preventing insider security breaches and simplifying compliance through automated, precise information access control and validation. Delivered through a cloud-based, cross-platform information security engine for enterprise customers.',
                'oneliner' => 'Torsion is an innovative cyber security company, focussed on preventing insider security breaches.',
                'website' => 'http://www.torsionis.com/',
                'twitter' => 'https://twitter.com/TorsionIS',
                'facebook' => 'http://www.facebook.com/torsionis',
                'linkedin' => 'https://www.linkedin.com/company-beta/10042043?pathWildcard=10042043',
                'pitchdeck' => '',
                'status' => 'active',
                'goal' => 75000,
                'equity' => '10.00',
                'valuation' => 675000,
                'tax' => 'SEIS',
                'location' => 'London',
                'finalized' => '0',
                'featured' => '1',
                'opportunity' => '1',
                'portfolio' => '0',
                'video' => 'https://player.vimeo.com/video/120892916?title=0&byline=0&portrait=0',
                'response_1' => '89% of companies suffer at least one information security breach each month, which was caused by a staff member. Among a vast sea of documents, constant business change causes 7 in 10 staff to have access to information they shouldn’t have - creating severe security risks and compliance challenges.',
                'response_2' => 'Torsion is focussed on Access Control and Validation - controlling who has access to what, and validating who has access to what. It constantly ensures that all staff can access only the information they need, and lets auditors quickly validate access in compliance with critical regulations.',
                'response_3' => 'Torsion identifies with the Identity and Access Control segment of the Cyber Security market. Total Addressable Market: $1.9bn (2016) to $3.5bn (2021) (UK and W. Europe), and $8.1bn (2016) to $14.8bn (2021) (globally). Target verticals are Banking & Finance, Professional Services and Public Sector.',
                'response_4' => 'Torsion will operate a value-based SaaS business model, based on customer company size, with a 30-day free trial. Basic pricing at £5 per month per customer staff member, with premium features restricted to higher subscription levels. Average customer spend approximately £30K recurring annually.',
                'response_5' => 'Designed and built prototype, held numerous meetings with CTOs, CIOs and partners to validate demand, iterated the prototype per feedback, and built a functional subset of the product vision as the MVP. First partnership (key route to market) is secured, and first pilot customer is engaged.',
                'response_6' => 'Most approach the problem by providing tools to IT admins. Building on a false assumption – that IT actually knows what any information is, or who should have it. Torsion builds on a deep understanding of enterprise information management, approaching security as a business challenge, not an IT one.',
                'response_7' => 'Peter Bradley, Founder & CEO: 13-year consultant in secure information management. Business (MBA) and technical (Comp Sci) background. James Stevenson, Board Advisor: Former VP Sales & Marketing with Citrix & HP, invested 2016. Barry Wakelin, Board Advisor: >25 years exp. in domain, invested 2016',
                'response_8' => 'Establish the initial technical and delivery scale to support our first customer pilots, and ensure they are delivered perfectly. Most immediate priority is bringing on board a strong CTO, and leading the first customer pilots into first revenues.',
                'response_9' => 'Torsion has a validated, high-value market proposition, and its MVP is ready. It has established its first partnership, engaged its first pilot customer, and built a customer pipeline. Led by deeply experienced IT industry professionals, and strategically positioned in an enormous growth market.',
                'response_10' => 'The company is currently under-capitalised to strongly deliver the first customer pilots, and the sole-founder is currently doing both CEO and CTO roles. The funds from the first tranche of this investment process will be used to directly offset both issues.',
                'response_11' => 'Having spent years working on these problems with past consulting clients, the shortcomings of all available solutions on the market were very apparent. Torsion is bringing genuine innovation to an old problem, and the vibrant response from the industry pros who have seen it has been very exciting.',
                'created_at' => '2017-05-29 06:06:48',
                'updated_at' => '2017-05-29 06:06:48',
            ),
            2 => 
            array (
                'id' => 3,
                'user_id' => 4,
                'categories_id' => 15,
                'token_id' => '1as1BEc1VxDG3bJhQP4sR2WTL5gJztsoPb4ny0H7yOyiiD6uxABuFIoSf38fP6EZxeRD2A89eboKaL4zKIalJ9lY3nkUfTBXxO7WNFLfds6c8z4b6sGheOnvGxq4w8T2BzhASSPhnTqVk4WVvNHE4tw86cZ0ZdVJfesLlYi7uR3yrUMDqZ4uvmSb9WBKm2wjMSCdP2Wt',
                'logo' => '161493037372v8qp4g72feypm5a.png',
                'cover' => '161493037441jrr7miuxykuwqkr.png',
                'title' => 'Jupiter Diagnostics',
                'description' => 'Jupiter Diagnostics offers a faster, cheaper way to obtain accurate blood tests. Our patent-protected reader can replace the lab, delivering multiple tests in 10 minutes from a prick of blood at prices a third cheaper. With customers lined up, we are looking to top up our recent &pound;1.6m round.',
                'oneliner' => 'Jupiter Diagnostics offers a faster, cheaper way to obtain accurate blood tests',
                'website' => 'http://www.jupiterdiagnostics.com',
                'twitter' => '',
                'facebook' => '',
                'linkedin' => 'https://www.linkedin.com/company-beta/10249729/?pathWildcard=10249729',
                'pitchdeck' => '',
                'status' => 'active',
                'goal' => 500000,
                'equity' => '20.00',
                'valuation' => 2000000,
                'tax' => 'EIS',
                'location' => 'London',
                'finalized' => '0',
                'featured' => '1',
                'opportunity' => '1',
                'portfolio' => '0',
                'video' => '',
                'response_1' => 'Clinic-based doctors lack ready access to reliable blood tests. Today’s solution – either sending the patient or a blood sample to a lab – is fundamentally inefficient, as doctors have to wait a day or more for this basic medical information, meaning diagnosis and treatment are delayed.',
                'response_2' => 'Our answer is to offer faster and cheaper blood testing using a low-cost handheld reader. Thanks to the company’s patented technology, Jupiter can replace the lab, delivering similar quality results in ten minutes for multiple tests from a prick of blood – and at prices a third cheaper.',
                'response_3' => 'Our first products are for the £100 million IVF test market, where current IVF blood testing is inconvenient and costly.',
                'response_4' => 'We follow the standard business model in the medical diagnostics sector, providing readers for free and making money on single-use disposable test cards. We will use specialist distributors to reach target customers, and expect to capture 25% of the reimbursed price of the test.',
                'response_5' => 'We have confirmed interest from private IVF clinics and gynaecologists in UK and Germany, and an agreement in place with Concile, a distributor already selling point-of-care tests to target customers in Germany and Spain. We are performing clinical studies at the Royal Free Hospital in London.',
                'response_6' => 'Competitors are big hospital laboratories, and desktop analysers or smaller mini-analysers which cost thousands of pounds. Laboratories are cheap but slow, while desktop analysers are expensive and only makes sense in the largest clinics.',
                'response_7' => 'Chris Ball, CEO: Ex-VC and medical doctor, launched £200m blood glucose meter for Johnson and Johnson Gareth Jones, CTO: Serial inventor for 10 UK diagnostic companies Dick Sandberg, Chair: Chair of Oxford Immunotec, where he raised £50m and listed it on NASDAQ. Founded and sold Dianon Systems',
                'response_8' => '1) Working capital to allow a longer runway to demonstrate sales growth 2) Expansion of tests on platform',
                'response_9' => 'Experienced management team with track record of delivering value to investors Well-developed patent-protected technology with clear route to market Proven demand with clear route to market Attractive exit opportunities',
                'response_10' => 'Tight budgets leave little room for error: raising additional capital now will clearly more the company through its next valuation increase Close to market but 12 months to go: at "works-like/looks-like" prototype stage - delivering final version Q2-17 for validation annd clinical testing',
                'response_11' => 'I used to work as a doctor and found taking blood and waiting for the results was a painful experience for my patients and me. I decided there had to be a better way and became an entrepreneur to find an answer which could make healthcare more efficient and better for patients.',
            'created_at' => '2017-05-29 06:06:48',
            'updated_at' => '2017-05-29 06:06:48',
        ),
    ));

    }
}