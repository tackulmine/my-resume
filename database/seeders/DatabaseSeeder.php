<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();

        \App\Models\User::truncate();
        \App\Models\User::factory(1)->create([
            'name'  => 'Meftahul Jannah',
            'email' => 'tackulmine@gmail.com',
        ]);

//         \App\Models\UserProfile::truncate();
        //         DB::statement("INSERT INTO `user_profiles` (`id`, `user_id`, `photo`, `job_title`, `phone`, `career_summary`, `created_at`, `updated_at`) VALUES (1, 1, 'avatars/1.jpg', 'Full Stack Web Developer', '0856 4992 8983', '<p>I am experienced in Web Base Programming using PHP Framework Laravel or Codeigniter, Web 2.0 technology (CSS3, HTML5), Bootstrap Framework or TailwindCSS, Javascript and jQuery. I am able to work individually or in a team, and having experience in organizing while studying and being a Team Lead and Manager while working both at SMART IT and IDN Media.</p>', '2021-09-27 17:10:08', '2022-03-13 17:49:33');");

//         DB::statement("INSERT INTO `education` (`id`, `user_id`, `title`, `major`, `start_date`, `end_date`, `is_now_end_date`, `gpa`, `city`, `province`, `created_at`, `updated_at`) VALUES
        // (1, 1, 'SMA NEGERI I GRATI', 'Ilmu Pengetahuan Alam', '2002-07-01', '2005-06-30', 0, NULL, 'Pasuruan', 'Jawa Timur', '2021-09-27 17:21:14', '2021-09-27 17:21:14'),
        // (2, 1, 'POLITEKNIK NEGERI MALANG', 'Manajemen Informatika', '2005-07-01', '2008-06-30', 0, '2.99', 'Malang', 'Jawa Timur', '2021-09-27 17:21:53', '2021-09-27 17:21:53');");

//         DB::statement("INSERT INTO `interests` (`id`, `user_id`, `title`, `order_no`, `created_at`, `updated_at`) VALUES
        // (1, 1, 'Futsal', NULL, '2021-09-27 23:25:46', '2021-09-27 23:25:46'),
        // (2, 1, 'Gaming', NULL, '2021-09-27 23:25:51', '2021-09-27 23:25:51'),
        // (3, 1, 'Playing the guitar', NULL, '2021-09-27 23:26:03', '2021-09-27 23:26:03'),
        // (4, 1, 'Table Tenis', NULL, '2021-09-28 06:21:52', '2022-03-13 17:41:35'),
        // (5, 1, 'Badminton', NULL, '2022-03-13 17:50:45', '2022-03-13 17:50:45');");

//         DB::statement("INSERT INTO `languages` (`id`, `user_id`, `title`, `value`, `order_no`, `created_at`, `updated_at`) VALUES
        // (1, 1, 'Bahasa', 'Native', NULL, '2021-09-27 23:15:14', '2021-09-27 23:15:14'),
        // (2, 1, 'English', 'Passive', NULL, '2021-09-27 23:15:21', '2021-09-27 23:15:21');");

//         DB::statement("INSERT INTO `project_types` (`id`, `title`, `order_no`, `created_at`, `updated_at`) VALUES
        // (1, 'E-Commerce', NULL, '2021-09-27 17:22:58', '2021-09-27 17:22:58'),
        // (2, 'News', NULL, '2021-09-28 00:50:17', '2021-09-28 00:50:17');");

//         DB::statement("INSERT INTO `projects` (`id`, `user_id`, `project_type_id`, `title`, `description`, `url`, `photo`, `start_date`, `end_date`, `created_at`, `updated_at`) VALUES
        // (1, 1, 1, 'bloom-outdoor.com', NULL, 'https://bloom-outdoor.com', 'projects/1.jpg', NULL, NULL, '2021-09-27 17:22:58', '2021-09-27 17:22:58'),
        // (2, 1, 1, 'dino-lite.co.id', NULL, 'https://dino-lite.co.id', 'projects/2.jpg', NULL, NULL, '2021-09-27 17:23:30', '2021-09-27 17:23:30'),
        // (3, 1, 2, 'IDNTimes.com', NULL, '//www.idntimes.com', 'projects/3.jpg', NULL, NULL, '2021-09-28 00:50:17', '2021-09-28 01:50:10'),
        // (4, 1, 2, 'Popbela.com', NULL, '//www.popbela.com', 'projects/4.jpg', NULL, NULL, '2021-09-28 00:50:46', '2021-09-28 00:50:46'),
        // (5, 1, 2, 'Popmama.com', NULL, '//www.popmama.com', 'projects/5.jpg', NULL, NULL, '2021-09-28 00:51:13', '2021-09-28 00:51:13'),
        // (6, 1, 2, 'Yummy.co.id', NULL, '//www.yummy.co.id', 'projects/6.jpg', NULL, NULL, '2021-09-28 00:51:53', '2021-09-28 01:49:53'),
        // (7, 1, 2, 'FortuneIDN.com', NULL, '//www.fortuneidn.com', 'projects/7.jpg', NULL, NULL, '2021-09-28 01:50:38', '2021-09-28 01:50:38');");

//         DB::statement("INSERT INTO `skill_types` (`id`, `title`, `order_no`, `created_at`, `updated_at`) VALUES
        // (1, 'Backend', NULL, '2021-09-27 22:09:27', '2021-09-27 22:09:27'),
        // (2, 'Frontend', NULL, '2021-09-27 22:13:33', '2021-09-27 22:13:33'),
        // (3, 'Others', NULL, '2021-09-27 22:18:54', '2021-09-27 22:18:54');");

//         DB::statement("INSERT INTO `skills` (`id`, `user_id`, `skill_type_id`, `title`, `percentage`, `order_no`, `created_at`, `updated_at`) VALUES
        // (1, 1, 1, 'Laravel/Lumen', '90', NULL, '2021-09-27 22:09:28', '2021-09-27 22:48:18'),
        // (2, 1, 1, 'Codeigniter', '90', NULL, '2021-09-27 22:11:46', '2021-09-27 22:48:27'),
        // (3, 1, 1, 'MySQL', '90', NULL, '2021-09-27 22:12:58', '2021-09-27 22:48:34'),
        // (4, 1, 2, 'HTML5', '90', NULL, '2021-09-27 22:13:33', '2021-09-27 22:48:56'),
        // (5, 1, 2, 'CSS3/SASS/LESS', '90', NULL, '2021-09-27 22:14:15', '2021-09-27 22:49:08'),
        // (6, 1, 2, 'Javascript', '70', NULL, '2021-09-27 22:16:52', '2021-09-27 22:49:16'),
        // (7, 1, 1, 'NodeJS/ExpressJS', '60', NULL, '2021-09-27 22:17:49', '2021-09-28 00:29:54'),
        // (8, 1, 3, 'Git', NULL, NULL, '2021-09-27 22:18:54', '2021-09-27 22:18:54'),
        // (9, 1, 3, 'HTML Slicing', NULL, NULL, '2021-09-27 22:19:14', '2021-09-27 22:19:14'),
        // (10, 1, 3, 'Unit Testing', NULL, NULL, '2021-09-27 22:19:27', '2021-09-27 22:19:27'),
        // (11, 1, 3, 'Wireframing', NULL, NULL, '2021-09-27 22:19:47', '2021-09-27 22:19:47'),
        // (12, 1, 3, 'RDBMS', NULL, NULL, '2021-09-27 22:20:22', '2021-09-27 22:20:22'),
        // (13, 1, 1, 'PHP', '90', NULL, '2021-09-27 22:46:17', '2021-09-27 22:46:17'),
        // (14, 1, 1, 'Go', '10', NULL, '2021-09-27 22:46:27', '2021-09-27 22:48:10'),
        // (15, 1, 1, 'MongoDB', '70', NULL, '2021-09-27 22:49:51', '2021-09-27 22:49:51'),
        // (16, 1, 2, 'AlpineJS', '80', NULL, '2021-09-27 22:50:18', '2021-09-28 00:45:35'),
        // (17, 1, 2, 'VueJS', '10', NULL, '2021-09-27 22:50:39', '2021-09-27 22:50:56'),
        // (18, 1, 3, 'Microservice', NULL, NULL, '2021-09-27 23:26:53', '2021-09-27 23:26:53');");

//         DB::statement("INSERT INTO `social_media` (`id`, `user_id`, `title`, `url`, `fa_class`, `order_no`, `created_at`, `updated_at`) VALUES
        // (1, 1, 'linkedin.com/in/meftahul-jannah', 'https://linkedin.com/in/meftahul-jannah', 'fab fa-linkedin-in fa-fw', 0, '2021-09-27 23:48:36', '2021-09-27 23:48:36'),
        // (2, 1, 'github.com/tackulmine', 'https://github.com/tackulmine', 'fab fa-github-alt fa-fw', 1, '2021-09-27 23:54:16', '2021-09-27 23:54:16'),
        // (3, 1, 'codepen.io/tackulmine', 'https://codepen.io/tackulmine', 'fab fa-codepen fa-fw', 2, '2021-09-27 23:55:21', '2021-09-27 23:55:21'),
        // (4, 1, 'meftahul.com', '//meftahul.com', 'fas fa-globe fa-fw', 3, '2021-09-27 23:55:46', '2021-09-28 00:18:37');");

//         DB::statement("INSERT INTO `taggable_tags` (`tag_id`, `name`, `normalized`, `created_at`, `updated_at`) VALUES
        // (1, 'Codeigniter', 'codeigniter', '2021-09-27 17:14:21', '2021-09-27 17:14:21'),
        // (2, 'Bootstrap', 'bootstrap', '2021-09-27 17:14:21', '2021-09-27 17:14:21'),
        // (3, 'jQuery', 'jquery', '2021-09-27 17:14:21', '2021-09-27 17:14:21'),
        // (4, 'MySQL', 'mysql', '2021-09-27 17:14:21', '2021-09-27 17:14:21'),
        // (5, 'PHP', 'php', '2021-09-27 17:14:21', '2021-09-27 17:14:21'),
        // (6, 'HTML5', 'html5', '2021-09-27 17:14:21', '2021-09-27 17:14:21'),
        // (7, 'CSS3', 'css3', '2021-09-27 17:14:21', '2021-09-27 17:14:21'),
        // (8, 'Grunt', 'grunt', '2021-09-27 17:14:21', '2021-09-27 17:14:21'),
        // (9, 'Gulp', 'gulp', '2021-09-27 17:14:21', '2021-09-27 17:14:21'),
        // (10, 'SASS', 'sass', '2021-09-27 17:14:21', '2021-09-27 17:14:21'),
        // (11, 'LESS', 'less', '2021-09-27 17:14:21', '2021-09-27 17:14:21'),
        // (12, 'Javascript', 'javascript', '2021-09-27 17:14:21', '2021-09-27 17:14:21'),
        // (13, 'Laravel', 'laravel', '2021-09-27 17:20:16', '2021-09-27 17:20:16'),
        // (14, 'Lumen', 'lumen', '2021-09-27 17:20:16', '2021-09-27 17:20:16'),
        // (15, 'MongoDB', 'mongodb', '2021-09-27 17:20:16', '2021-09-27 17:20:16'),
        // (16, 'Webpack', 'webpack', '2021-09-27 17:20:16', '2021-09-27 17:20:16'),
        // (17, 'TailwindCSS', 'tailwindcss', '2021-09-27 17:20:16', '2021-09-27 17:20:16');");

//         DB::statement("INSERT INTO `taggable_taggables` (`tag_id`, `taggable_id`, `taggable_type`, `created_at`, `updated_at`) VALUES
        // (1, 1, 'App\\Models\\WorkExperience', '2022-03-13 17:52:08', '2022-03-13 17:52:08'),
        // (2, 1, 'App\\Models\\WorkExperience', '2022-03-13 17:52:08', '2022-03-13 17:52:08'),
        // (2, 2, 'App\\Models\\WorkExperience', '2022-03-13 17:52:23', '2022-03-13 17:52:23'),
        // (3, 1, 'App\\Models\\WorkExperience', '2022-03-13 17:52:08', '2022-03-13 17:52:08'),
        // (3, 2, 'App\\Models\\WorkExperience', '2022-03-13 17:52:23', '2022-03-13 17:52:23'),
        // (4, 1, 'App\\Models\\WorkExperience', '2022-03-13 17:52:08', '2022-03-13 17:52:08'),
        // (4, 2, 'App\\Models\\WorkExperience', '2022-03-13 17:52:23', '2022-03-13 17:52:23'),
        // (5, 1, 'App\\Models\\WorkExperience', '2022-03-13 17:52:08', '2022-03-13 17:52:08'),
        // (5, 2, 'App\\Models\\WorkExperience', '2022-03-13 17:52:23', '2022-03-13 17:52:23'),
        // (6, 1, 'App\\Models\\WorkExperience', '2022-03-13 17:52:08', '2022-03-13 17:52:08'),
        // (6, 2, 'App\\Models\\WorkExperience', '2022-03-13 17:52:23', '2022-03-13 17:52:23'),
        // (7, 1, 'App\\Models\\WorkExperience', '2022-03-13 17:52:08', '2022-03-13 17:52:08'),
        // (7, 2, 'App\\Models\\WorkExperience', '2022-03-13 17:52:23', '2022-03-13 17:52:23'),
        // (8, 1, 'App\\Models\\WorkExperience', '2022-03-13 17:52:08', '2022-03-13 17:52:08'),
        // (9, 1, 'App\\Models\\WorkExperience', '2022-03-13 17:52:08', '2022-03-13 17:52:08'),
        // (10, 1, 'App\\Models\\WorkExperience', '2022-03-13 17:52:08', '2022-03-13 17:52:08'),
        // (10, 2, 'App\\Models\\WorkExperience', '2022-03-13 17:52:23', '2022-03-13 17:52:23'),
        // (11, 1, 'App\\Models\\WorkExperience', '2022-03-13 17:52:08', '2022-03-13 17:52:08'),
        // (12, 1, 'App\\Models\\WorkExperience', '2022-03-13 17:52:08', '2022-03-13 17:52:08'),
        // (12, 2, 'App\\Models\\WorkExperience', '2022-03-13 17:52:23', '2022-03-13 17:52:23'),
        // (13, 2, 'App\\Models\\WorkExperience', '2022-03-13 17:52:23', '2022-03-13 17:52:23'),
        // (14, 2, 'App\\Models\\WorkExperience', '2022-03-13 17:52:23', '2022-03-13 17:52:23'),
        // (15, 2, 'App\\Models\\WorkExperience', '2022-03-13 17:52:23', '2022-03-13 17:52:23'),
        // (16, 2, 'App\\Models\\WorkExperience', '2022-03-13 17:52:23', '2022-03-13 17:52:23'),
        // (17, 2, 'App\\Models\\WorkExperience', '2022-03-13 17:52:23', '2022-03-13 17:52:23');");

//         DB::statement("INSERT INTO `work_experiences` (`id`, `user_id`, `title`, `company`, `start_date`, `end_date`, `is_now_end_date`, `summary`, `created_at`, `updated_at`) VALUES
        // (1, 1, 'Engineering Manager | Senior Web Developer', 'SMART IT', '2008-10-01', '2016-12-31', 0, '<p>As web developer, I work based on CEO or client request directly, doing various website types such as company profile, custom web and e-commerce.</p>\r\n<p><strong>Achievements</strong>:</p>\r\n<ul>\r\n<li>Create CMS generator using Codeigniter to speed up the development process for our client.</li>\r\n<li>Create custom GPS tracker and the reports based on Google API using Codeigniter.</li>\r\n</ul>', '2021-09-27 17:14:21', '2022-03-13 17:52:08'),
        // (2, 1, 'Engineering Manager | Senior Software Engineer | Technical Lead Engineer Web Team', 'IDN Media', '2017-01-01', NULL, 0, '<p>As a technical lead engineer of Web Team at IDN Media my responsibilities are responsible for managing the development cycle with the tribe lead and product team, mentoring junior engineer to improve the skills, leading the sprint scrums such as the planning, grooming, working, retrospective with the sprint team based on the story points and the kanban team.</p>\r\n<p><strong>Achievements:</strong></p>\r\n<ul>\r\n<li>upgrade idntimes.com version to v5</li>\r\n<li>upgrade popbela.com version to v2</li>\r\n<li>create popmama.com</li>\r\n<li>create popmama.com/community</li>\r\n<li>create yummy.co.id</li>\r\n<li>create a microsite popac.popmama.com</li>\r\n<li>create a microsite beautyfestasia.popbela.com</li>\r\n<li>create a microsite kerastase.popbela.com</li>\r\n<li>create fortuneidn.com</li>\r\n</ul>', '2021-09-27 17:20:16', '2022-03-13 17:52:23');");

        // DB::statement("");
        Schema::enableForeignKeyConstraints();
    }
}
