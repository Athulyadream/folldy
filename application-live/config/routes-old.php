<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

//backend

$route['admin-login'] = 'welcome/login';
$route['logout'] = 'welcome/logout';
$route['dashboard'] = 'AdminController/dashboard';

$route['roles'] = 'AdminController/roles';
$route['roles/(:num)'] = 'AdminController/roles';
$route['add-roles'] = 'AdminController/add_roles';
$route['edit-roles'] = 'AdminController/edit_roles';
$route['admins'] = 'AdminController/admins';
$route['admins/(:num)'] = 'AdminController/admins';
$route['add-admin'] = 'AdminController/add_admin';
$route['edit-admin'] = 'AdminController/edit_admin';
$route['tables'] = 'AdminController/tables';
$route['tables/(:num)'] = 'AdminController/tables';
$route['add-table'] = 'AdminController/add_table';
$route['edit-table'] = 'AdminController/edit_table';
$route['courses'] = 'AdminController/courses';
$route['courses/(:num)'] = 'AdminController/courses';

$route['add-course'] = 'AdminController/add_course';
$route['edit-course'] = 'AdminController/edit_course';
$route['papers'] = 'AdminController/papers';
$route['papers/(:num)'] = 'AdminController/papers';

$route['institutes'] = 'InstituteController/institutes';
$route['institutes/(:num)'] = 'InstituteController/institutes';
$route['add-institute'] = 'InstituteController/add_institute';
$route['edit-institute'] = 'InstituteController/edit_institute';
$route['institute-users'] = 'InstituteController/institutes_users/$1';
$route['institute-users'] = 'InstituteController/institutes_users';
$route['institute-users/(:num)'] = 'InstituteController/institutes_users';

$route['add-institute-user'] = 'InstituteController/add_institute_user';
$route['edit-institute-user'] = 'InstituteController/edit_institute_user';

$route['add-paper'] = 'AdminController/add_paper';
$route['edit-paper'] = 'AdminController/edit_paper';
$route['chapters'] = 'AdminController/chapters';
$route['chapters/(:num)'] = 'AdminController/chapters';

$route['add-chapter'] = 'AdminController/add_chapter';
$route['edit-chapter'] = 'AdminController/edit_chapter';
$route['questions'] = 'AdminController/questions';
$route['questions/(:num)'] = 'AdminController/questions';
$route['add-question'] = 'AdminController/add_question';
// $route['edit-question'] = 'AdminController/edit_question';
$route['view'] = 'AdminController/view_question11';


 $route['edit-question/(:num)'] = 'AdminController/questions_list_edit';


$route['change-theme'] = 'AdminController/change_theme';
$route['table-keywords/(:num)'] = 'AdminController/table_keywords/$1';
$route['answers/(:num)'] = 'AdminController/answers/$1';
$route['add-answer/(:num)'] = 'AdminController/add_answer/$1';
$route['delete-answer/(:num)/(:num)'] = 'AdminController/delete_answer/$1/$2';
$route['category-filter'] = 'AdminController/category_filter';

$route['chapter-design'] = 'AdminController/chapter_design';
$route['chapter-design/(:num)'] = 'AdminController/chapter_design';


//institute
$route['institute'] = 'institute/LoginController';
$route['institute-login'] = 'institute/LoginController/login';
$route['institute-dashboard'] = 'institute/InstituteController/dashboard';
$route['institute-logout'] = 'institute/LoginController/institute_logout';
$route['forgot-password'] = 'institute/LoginController/forgot_password';

//teachers

$route['teachers'] = 'institute/InstituteController/teachers';
$route['teachers/(:num)'] = 'institute/InstituteController/teachers';
$route['add-teacher'] = 'institute/InstituteController/add_teacher';
$route['edit-teacher'] = 'institute/InstituteController/edit_teacher';

$route['batch'] = 'institute/InstituteController/batch';
$route['batch/(:num)'] = 'institute/InstituteController/batch';
$route['add-batch'] = 'institute/InstituteController/add_batch';
$route['edit-batch'] = 'institute/InstituteController/edit_batch';

$route['students'] = 'institute/InstituteController/students';
$route['students/(:num)'] = 'institute/InstituteController/students';
$route['add-student'] = 'institute/InstituteController/add_student';
$route['edit-student'] = 'institute/InstituteController/edit_student';

$route['news'] = 'institute/InstituteController/news';
$route['news/(:num)'] = 'institute/InstituteController/news';
$route['add-news'] = 'institute/InstituteController/add_news';
$route['edit-news'] = 'institute/InstituteController/edit_news';

$route['admin-news'] = 'InstituteController/news';
$route['admin-news/(:num)'] = 'InstituteController/news';
$route['add-admin-news'] = 'InstituteController/add_news';
$route['edit-admin-news'] = 'InstituteController/edit_news';

$route['events'] = 'institute/InstituteController/events';
$route['events/(:num)'] = 'institute/InstituteController/events';
$route['add-event'] = 'institute/InstituteController/add_event';
$route['edit-event'] = 'institute/InstituteController/edit_event';

$route['time-table/(:num)'] = 'institute/InstituteController/time_table/$1';
$route['add-time-table'] = 'institute/InstituteController/add_time_table';

$route['assign-teacher/(:num)'] = 'institute/InstituteController/assign_teacher/$1';

$route['add-assigned-teacher'] = 'institute/InstituteController/add_assigned_teacher';

//teacher login

$route['teacher'] = 'welcome/teacher_login_view';
$route['teacher-login'] = 'welcome/teacher_login';
$route['teacher-dashboard'] = 'teacher/TeacherController/dashboard';
$route['teacher-logout'] = 'welcome/teacher_logout';
$route['forgot-password-teacher'] = 'welcome/forgot_password_teacher';


$route['teacher-batch'] = 'teacher/TeacherController/teacher_batch';
$route['teacher-batch/(:num)'] = 'teacher/TeacherController/teacher_batch';
$route['teacher-papers'] = 'teacher/TeacherController/papers';
$route['teacher-papers/(:num)'] = 'AdminController/papers';

$route['teacher-chapters'] = 'teacher/TeacherController/chapters';
$route['teacher-chapters/(:num)'] = 'teacher/TeacherController/chapters';
$route['publish-chapter/(:num)'] = 'teacher/TeacherAjaxController/publish_chapter/$1';

//bhagya new
$route['teacher-students'] = 'teacher/TeacherController/teacher_students';
$route['teacher-students/(:num)'] = 'teacher/TeacherController/teacher_students';

$route['batch-students'] = 'teacher/TeacherController/batch_students';
$route['batch-students/(:num)'] = 'teacher/TeacherController/batch_students';

$route['dashboard-chapter'] = 'teacher/TeacherController/dashboard_chapter';


/*athulya*/
$route['chapter-design-teacher'] = 'teacher/TeacherController/chapter_design_teacher';
$route['chapter-design-teacher/(:num)'] = 'teacher/TeacherController/chapter_design_teacher';
$route['chapter-publish-teacher/(:num)/(:num)/(:num)/(:num)'] = 'teacher/TeacherController/chapter_publish/$1/$2/$3/$4';
$route['chapter-view-teacher/(:num)'] = 'teacher/TeacherController/chapter_view/$1';
$route['add-chapter-design-teacher/(:num)'] = 'teacher/TeacherController/add_chapter_design/$1';
$route['get-chapter-teacher'] = 'teacher/TeacherController/get_chapter_teacher';
$route['update-chapter-teacher'] = 'teacher/TeacherController/update_chapter';
$route['update-chapter-title'] = 'teacher/TeacherController/update_chapter_title';

$route['presentation-edit-slide-teacher/(:num)'] = 'teacher/TeacherController/presentation_edit_slide/$1';
$route['presentation-slide-teacher/(:num)'] = 'teacher/TeacherController/presentation_slide/$1';
// $route['presentation-slide-pre/(:num)'] = 'PresentationController/presentation_slide_pre/$1';

$route['presentation-slide-view-teacher/(:num)'] = 'teacher/TeacherController/presentation_slide_view/$1';

/*athulya*/

//filter

$route['admin-filter'] = 'AdminController/admin_filter';
$route['role-filter'] = 'AdminController/role_filter';
$route['course-filter'] = 'AdminController/course_filter';
$route['paper-filter'] = 'AdminController/paper_filter';
$route['chapter-filter'] = 'AdminController/chapter_filter';

$route['institute-filter'] = 'InstituteController/institute_filter';
$route['user-filter/(:num)'] = 'InstituteController/user_filter/$1';
$route['teacher-filter'] = 'institute/InstituteController/teacher_filter';
$route['batch-filter'] = 'institute/InstituteController/batch_filter';
$route['student-filter'] = 'institute/InstituteController/student_filter';
$route['news-filter'] = 'institute/InstituteController/news_filter';
$route['event-filter'] = 'institute/InstituteController/event_filter';


$route['video'] = 'InstituteController/video';
$route['video/(:num)'] = 'InstituteController/video';
$route['add-video'] = 'InstituteController/add_video';
$route['delete-video/(:num)'] = 'InstituteController/delete_video/$1';
$route['delete-image/(:num)'] = 'InstituteController/delete_image/$1';

$route['exercise'] = 'InstituteController/exercise';
$route['exercise/(:num)'] = 'InstituteController/exercise';
$route['add-exercise'] = 'InstituteController/add_exercise';
$route['edit-exercise'] = 'InstituteController/edit_exercise';

$route['exercise-bank'] = 'InstituteController/exercise_bank';
$route['exercise-bank/(:num)'] = 'InstituteController/exercise_bank';
$route['add-exercise-bank'] = 'InstituteController/add_exercise_bank';
$route['edit-exercise-bank'] = 'InstituteController/edit_exercise_bank';

$route['course-exercise'] = 'InstituteController/course_exercise';
$route['course-exercise/(:num)'] = 'InstituteController/course_exercise';

$route['exercise-view/(:num)'] = 'InstituteController/exercise_view/$1';

$route['upload-files'] = 'InstituteController/upload_files';
$route['upload-files/(:num)'] = 'InstituteController/upload_files';
$route['add-upload-files'] = 'InstituteController/add_upload_files';
//ajax

$route['get-exercise'] = 'AdminAjaxController/get_exercise';
$route['get-exercise-bank'] = 'AdminAjaxController/get_exercise_bank';
$route['delete-exercise-bank'] = 'AdminAjaxController/delete_exercise_bank';
$route['upload-chapter-image'] = 'AdminController/upload_chapter_image';

$route['get-ins-phone'] = 'AdminAjaxController/get_ins_phone';
$route['get-ins-email'] = 'AdminAjaxController/get_ins_email';
$route['get-institute'] = 'AdminAjaxController/get_institute';

$route['get-ins-user-phone'] = 'AdminAjaxController/get_ins_user_phone';
$route['get-ins-user-email'] = 'AdminAjaxController/get_ins_user_email';
$route['get-ins-user-username'] = 'AdminAjaxController/get_ins_user_username';
$route['get-admin-username'] = 'AdminAjaxController/get_admin_username';
$route['get-institute-user'] = 'AdminAjaxController/get_institute_user';

$route['get-teacher-email'] = 'institute/InstituteAjaxController/get_teacher_email';
$route['get-teacher-phone'] = 'institute/InstituteAjaxController/get_teacher_phone';
$route['get-teacher-username'] = 'institute/InstituteAjaxController/get_teacher_username';

$route['get-teacher'] = 'institute/InstituteAjaxController/get_teacher';

$route['get-batch-code'] = 'institute/InstituteAjaxController/get_batch_code';
$route['get-batch'] = 'institute/InstituteAjaxController/get_batch';

$route['get-student-email'] = 'institute/InstituteAjaxController/get_student_email';
$route['get-student-phone'] = 'institute/InstituteAjaxController/get_student_phone';
$route['get-student'] = 'institute/InstituteAjaxController/get_student';
$route['get-batch-course'] = 'institute/InstituteAjaxController/get_batch_course';

$route['get-news'] = 'institute/InstituteAjaxController/get_news';
$route['get-admin-news'] = 'AdminAjaxController/get_news';
$route['get-events'] = 'institute/InstituteAjaxController/get_events';

$route['get-role'] = 'AdminAjaxController/get_role';
$route['get-admin'] = 'AdminAjaxController/get_admin';
$route['get-table'] = 'AdminAjaxController/get_table';
$route['get-data'] = 'AdminAjaxController/get_data';
$route['add-keywords'] = 'AdminAjaxController/add_keywords';
$route['delete-keywords'] = 'AdminAjaxController/delete_keywords';
$route['add-transaction'] = 'AdminAjaxController/add_transaction';
$route['edit-transaction'] = 'AdminAjaxController/edit_transaction';
$route['get-transaction'] = 'AdminAjaxController/get_transaction';
$route['delete-transaction'] = 'AdminAjaxController/delete_transaction';
$route['get-question'] = 'AdminAjaxController/get_question';
$route['reset-password'] = 'AdminAjaxController/reset_password';
$route['file-upload'] = 'AdminAjaxController/file_upload';
$route['add-question-table'] = 'AdminAjaxController/add_question_table';
$route['add-table-col'] = 'AdminAjaxController/add_col';
$route['add-rows'] = 'AdminAjaxController/add_row';
$route['remove-qt'] = 'AdminAjaxController/remove_qt';
$route['remove-qt-cols'] = 'AdminAjaxController/remove_qt_cols';
$route['remove-qt-table'] = 'AdminAjaxController/remove_qt_table';
$route['add-qt-keys'] = 'AdminAjaxController/add_qt_keywords';

$route['add-answer-table']='AdminAjaxController/add_answer_table';
$route['edit-answer-table']='AdminAjaxController/edit_answer_table';

$route['get_answer_table']='AdminAjaxController/get_ans_table';

// $route['get-ans-table'] = 'AdminAjaxController/get_ans_table';

$route['get_qt_key'] = 'AdminAjaxController/get_qt_key';
$route['delete-question'] = 'AdminAjaxController/delete_question';
$route['delete-course'] = 'AdminAjaxController/delete_course';
$route['delete-admin'] = 'AdminAjaxController/delete_admin';
$route['delete-table'] = 'AdminAjaxController/delete_table';
$route['delete-paper'] = 'AdminAjaxController/delete_paper';
$route['delete-chapter'] = 'AdminAjaxController/delete_chapter';
$route['clone-question'] = 'AdminAjaxController/clone_question';
$route['checkcode_duplicate'] = 'AdminAjaxController/checkcode_duplicate';

// modification
$route['questions_list'] = 'AdminController/questions_list';
$route['problem-format'] = 'AdminController/problem_format';
$route['view-details/(:num)'] = 'AdminController/view_question';
$route['view-details_new/(:num)'] = 'AdminController/view_question_new';

$route['questions_list/(:num)'] = 'AdminController/questions_list';
$route['add-question-text'] = 'AdminAjaxController/add_question_text';
$route['add-question-new'] = 'AdminController/add_question_new';

$route['questions_list_add/(:num)'] = 'AdminController/questions_list_add';

$route['add-problem-format-values'] = 'AdminController/add_format_values';

// $route['answers-preview'] = 'AdminController/answers_preview';
$route['answers-preview/(:num)'] = 'AdminController/answers_preview';

$route['add-transaction-nw'] = 'AdminAjaxController/add_transaction_new';
$route['add-quest-table'] = 'AdminAjaxController/add_quest_table';


$route['add-table-ajax']='AdminController/add_table_ajax';
$route['add-problem-format']='AdminController/add_problem_format';
$route['add-problem-format-exist']='AdminController/add_problem_format_exist';


$route['edit-problem-format']='AdminController/edit_problem_format';


$route['add-answer-table-val']='AdminController/add_answer_table_val';

$route['add-problem-order']='AdminAjaxController/add_problem_order';
$route['add-problem-order-exist']='AdminAjaxController/add_problem_order_exist';


$route['add-qst-table-value']='AdminAjaxController/add_qst_table_values';

$route['edit-question-table']='AdminAjaxController/edit_question_table';
$route['get-problem-val']='AdminAjaxController/get_problem_val';
$route['add-problem-row']='AdminAjaxController/add_problem_row';


$route['add_quest_values']='AdminAjaxController/add_quest_values';
$route['add-quest-row']='AdminAjaxController/add_quest_row';






$route['edit-question-table-val']='AdminAjaxController/edit_question_table_values';
$route['delete-problem-format']='AdminAjaxController/delete_problem_format';
$route['delete-problem-format-row']='AdminAjaxController/delete_problem_format_row';
$route['edit-question-table-val-append']='AdminAjaxController/edit_question_table_values_append';
$route['edit-problem-format-name']='AdminAjaxController/edit_problem_name';
$route['delete-question-row']='AdminAjaxController/delete_question_row';


$route['delete-ans-row']='AdminAjaxController/delete_answer_row';
$route['remove-order-val']='AdminAjaxController/remove_order_val';

$route['add-underline-val']='AdminAjaxController/add_underline_val';
$route['add-double-underline-val']='AdminAjaxController/add_doubleline_val';
$route['add-qst-text-underline']='AdminAjaxController/add_text_underline_val';

$route['add-copy-excel']='AdminAjaxController/add_copy_excel';
$route['delete-quest-table']='AdminAjaxController/delete_quest_table';
$route['delete-ans-table']='AdminAjaxController/delete_ans_table';





$route['add-copy-excel-format']='AdminController/add_copy_excel_format';
$route['add-copy-excel-answer']='AdminController/add_copy_excel_answer';


$route['add_inter_question']='AdminAjaxController/add_inter_question';
$route['get-inter-question']='AdminAjaxController/get_inter_question';
$route['add_ans_header']='AdminAjaxController/add_ans_header';




$route['delete-chapter-design'] = 'AdminAjaxController/delete_chapter_design';

$route['get-presentation-topic'] = 'AdminAjaxController/get_presentation_topic';










//////////////////Presentation Controller///////////////////////////////////


$route['presentation-slide/(:num)'] = 'PresentationController/presentation_slide/$1';
// $route['presentation-slide-pre/(:num)'] = 'PresentationController/presentation_slide_pre/$1';

$route['presentation-slide-view/(:num)'] = 'PresentationController/presentation_slide_view/$1';


$route['presentation'] = 'PresentationController/presentation';
$route['presentation/(:num)'] = 'PresentationController/presentation';
$route['add-presentation'] = 'PresentationController/add_presentation';
$route['edit-presentation'] = 'PresentationController/edit_presentation';
$route['presentation-sub/(:num)'] = 'PresentationController/presentation_sub/$1';
$route['presentation-sub/(:num)'] = 'PresentationController/presentation_sub/$1';

$route['add-presentation-sub'] = 'PresentationController/add_presentation_sub';
$route['edit-presentation-sub'] = 'PresentationController/edit_presentation_sub';
$route['get-presentation'] = 'PresentationController/get_presentation';
$route['get-presentation-sub'] = 'PresentationController/get_presentation_sub';

$route['add-slide'] = 'PresentationController/add_slide';
$route['get-slide'] = 'PresentationController/get_slide';
$route['get-topic'] = 'PresentationController/get_topic';

$route['add-topic'] = 'PresentationController/add_topic';
$route['add-topic-practice'] = 'PresentationController/add_topic_practice';
$route['add-slide'] = 'PresentationController/add_slide';

$route['add-subtopic'] = 'PresentationController/add_subtopic';
$route['topic/(:num)'] = 'PresentationController/topic/$1';
$route['update-slide'] = 'PresentationController/update_slide';
$route['update-topic'] = 'PresentationController/update_topic';
$route['update-topic-style'] = 'PresentationController/update_topic_style';
$route['update-topic-position'] = 'PresentationController/update_topic_position';
$route['update-content-position'] = 'PresentationController/update_content_position';
$route['update-topic-content-position'] = 'PresentationController/update_topic_content_position';
$route['update-topic-values'] = 'PresentationController/update_topic_values';






$route['add-image'] = 'PresentationController/add_image';
$route['add-image-topic'] = 'PresentationController/add_image_topic';
$route['add-topicimage'] = 'PresentationController/add_topicimage';
$route['add-image-gallery'] = 'PresentationController/add_image_gallery';
$route['add-image-folder-gallery'] = 'PresentationController/add_image_folder_gallery';
$route['add-question'] = 'PresentationController/add_question';



$route['update-image-position'] = 'PresentationController/update_image_position';
$route['update-image-size'] = 'PresentationController/update_image_size';
$route['update-image'] = 'PresentationController/update_image';




$route['add-image2'] = 'PresentationController/add_image2';
$route['add-image3'] = 'PresentationController/add_image3';
$route['create-folder'] = 'PresentationController/create_folder';
$route['add-image-folder'] = 'PresentationController/add_image_folder';
$route['check-presentation-title'] = 'PresentationController/check_presentation_title';
$route['copy-topic'] = 'PresentationController/copy_topic';
$route['add-image-folder-back'] = 'PresentationController/add_image_folder_back';
$route['delete-presentation'] = 'PresentationController/delete_presentation';


$route['add-chapter-design/(:num)'] = 'PresentationController/add_chapter_design/$1';
$route['add-chapterimage'] = 'PresentationController/add_chapterimage';
$route['add-image-chapter'] = 'PresentationController/add_image_chapter';
$route['add-image-chapter-back'] = 'PresentationController/add_image_chapter_back';


$route['update-chapter'] = 'PresentationController/update_chapter';
$route['update-chapter-position'] = 'PresentationController/update_chapter_position';
$route['update-chapter-content-position'] = 'PresentationController/update_chapter_content_position';
$route['update-chapter-values'] = 'PresentationController/update_chapter_values';
$route['chapter-publish/(:num)/(:num)/(:num)/(:num)'] = 'PresentationController/chapter_publish/$1/$2/$3/$4';
$route['presentation-edit-slide/(:num)'] = 'PresentationController/presentation_edit_slide/$1';
$route['chapter-view/(:num)'] = 'PresentationController/chapter_view/$1';
$route['get-chapter'] = 'PresentationController/get_chapter';
$route['upload-image'] = 'PresentationController/upload_image';
$route['add-topic-title'] = 'PresentationController/add_topic_title';
$route['get-image'] = 'PresentationController/get_image';

$route['getchilds'] = 'PresentationController/getchilds';
$route['get-presentation-search'] = 'PresentationController/get_presentation_search';
$route['update-chapter-data'] = 'PresentationController/update_chapter_data';
$route['unlinkfile/(:any)/(:any)/(:any)/(:any)'] = 'PresentationController/unlinkfile/$1/$2/$3/$4';
$route['update-content-size'] = 'PresentationController/update_content_size';
// $route['add-chapterimagegallery'] = 'PresentationController/add_chapterimagegallery';
$route['get-slide-data'] = 'PresentationController/get_slide';
$route['add-chapterimagegallery'] = 'PresentationController/add_chapterimagegallery';
$route['rename-folder'] = 'PresentationController/renamefolder';
$route['upload-content-image'] = 'PresentationController/upload_content_image';

$route['presentation-filter'] = 'PresentationController/presentation_filter';
$route['get-search-folder'] = 'PresentationController/get_search_folder';
$route['upload-chapter-thumbnail'] = 'PresentationController/upload_chapter_thumbnail';




// $route['add-chapter-design'] = 'PresentationController/add_chapter_design';



// $route['presentation-slide/(:num)'] = 'PresentationController/presentation_slide/$1';
// $route['presentation-slide-pre/(:num)'] = 'PresentationController/presentation_slide_pre/$1';

// $route['presentation-slide-view/(:num)'] = 'PresentationController/presentation_slide_view/$1';


// $route['presentation'] = 'PresentationController/presentation';
// $route['presentation/(:num)'] = 'PresentationController/presentation';
// $route['add-presentation'] = 'PresentationController/add_presentation';
// $route['edit-presentation'] = 'PresentationController/edit_presentation';
// $route['presentation-sub/(:num)'] = 'PresentationController/presentation_sub/$1';
// $route['presentation-sub/(:num)'] = 'PresentationController/presentation_sub/$1';

// $route['add-presentation-sub'] = 'PresentationController/add_presentation_sub';
// $route['edit-presentation-sub'] = 'PresentationController/edit_presentation_sub';
// $route['get-presentation'] = 'PresentationController/get_presentation';
// $route['get-presentation-sub'] = 'PresentationController/get_presentation_sub';

// $route['add-slide'] = 'PresentationController/add_slide';
// $route['get-slide'] = 'PresentationController/get_slide';
// $route['get-topic'] = 'PresentationController/get_topic';

// $route['add-topic'] = 'PresentationController/add_topic';
// $route['add-slide'] = 'PresentationController/add_slide';

// $route['add-subtopic'] = 'PresentationController/add_subtopic';
// $route['topic/(:num)'] = 'PresentationController/topic/$1';
// $route['update-slide'] = 'PresentationController/update_slide';
// $route['update-topic'] = 'PresentationController/update_topic';
// $route['update-topic-style'] = 'PresentationController/update_topic_style';
// $route['update-topic-position'] = 'PresentationController/update_topic_position';
// $route['update-content-position'] = 'PresentationController/update_content_position';
// $route['update-topic-content-position'] = 'PresentationController/update_topic_content_position';
// $route['update-topic-values'] = 'PresentationController/update_topic_values';






// $route['add-image'] = 'PresentationController/add_image';
// $route['add-image-topic'] = 'PresentationController/add_image_topic';
// $route['add-topicimage'] = 'PresentationController/add_topicimage';


// $route['add-image2'] = 'PresentationController/add_image2';
// $route['add-image3'] = 'PresentationController/add_image3';
// $route['create-folder'] = 'PresentationController/create_folder';
// $route['add-image-folder'] = 'PresentationController/add_image_folder';

///////////////////////////////Presentation controller//////////////////////////////////////

$route['teacher-reset-password'] = 'teacher/TeacherAjaxController/teacher_reset_password';
$route['institute-reset-password'] = 'institute/InstituteAjaxController/institute_reset_password';

$route['reset-filter'] = 'institute/InstituteAjaxController/reset_filter';
$route['reset-filter-admin'] = 'AdminAjaxController/reset_filter';