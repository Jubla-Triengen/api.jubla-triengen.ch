Table cache {
  key varchar(255) [pk]
  value mediumtext [not null]
  expiration bigint [not null]
}

Table cache_locks {
  key varchar(255) [pk]
  owner varchar(255) [not null]
  expiration bigint [not null]
}

Table failed_jobs {
  id bigint [pk, increment]
  uuid varchar(255) [unique, not null]
  connection text [not null]
  queue text [not null]
  payload longtext [not null]
  exception longtext [not null]
  failed_at timestamp [default: `current_timestamp()`, not null]
}

Table jobs {
  id bigint [pk, increment]
  queue varchar(255) [not null]
  payload longtext [not null]
  attempts tinyint [not null]
  reserved_at int
  available_at int [not null]
  created_at int [not null]
}

Table job_batches {
  id varchar(255) [pk]
  name varchar(255) [not null]
  total_jobs int [not null]
  pending_jobs int [not null]
  failed_jobs int [not null]
  failed_job_ids longtext [not null]
  options mediumtext
  cancelled_at int
  created_at int [not null]
  finished_at int
}

Table migrations {
  id int [pk, increment]
  migration varchar(255) [not null]
  batch int [not null]
}

Table password_reset_tokens {
  email varchar(255) [pk]
  token varchar(255) [not null]
  created_at timestamp
}

Table personal_access_tokens {
  id bigint [pk, increment]
  tokenable_type varchar(255) [not null]
  tokenable_id bigint [not null]
  name text [not null]
  token varchar(64) [unique, not null]
  abilities text
  last_used_at timestamp
  expires_at timestamp
  created_at timestamp
  updated_at timestamp
}

Table sessions {
  id varchar(255) [pk]
  user_id bigint
  ip_address varchar(45)
  user_agent text
  payload longtext [not null]
  last_activity int [not null]
}

Table users {
  id bigint [pk, increment]
  name varchar(255) [not null]
  email varchar(255) [unique, not null]
  email_verified_at timestamp
  password varchar(255) [not null]
  remember_token varchar(100)
  created_at timestamp
  updated_at timestamp
}

Table pages {
  id bigint  [pk, increment]
  slug varchar(100) [unique, not null, note: 'Route key, e.g. home/about/leaders']
  title varchar(255)
  subtitle text
  hero_image_id bigint  [null, ref: > images.id]
  hero_title varchar(255)
  hero_subtitle text
  created_at timestamp
  updated_at timestamp
}

Table page_settings {
  id bigint  [pk, increment]
  page_id bigint  [not null, ref: > pages.id]
  key varchar(100) [not null]
  value text [not null]
  sort_order int  [default: 0, not null]
  created_at timestamp
  updated_at timestamp

  indexes {
    (page_id, key) [unique]
  }
}

Table page_sections {
  id bigint  [pk, increment]
  page_id bigint  [not null, ref: > pages.id]
  title varchar(255)
  paragraph text
  image_id bigint  [null, ref: > images.id]
  button_label varchar(100)
  button_link varchar(255)
  orientation varchar(20)
  background_color varchar(50)
  sort_order int  [default: 0, not null]
  created_at timestamp
  updated_at timestamp
}

Table contact_infos {
  id bigint  [pk, increment]
  page_id bigint  [not null, ref: > pages.id]
  email varchar(255)
  phone varchar(50)
  organization varchar(255)
  street varchar(255)
  postal_code varchar(20)
  city varchar(100)
  country varchar(100)
  sort_order int  [default: 0, not null]
  created_at timestamp
  updated_at timestamp
}

Table leaders {
  id bigint  [pk, increment]
  slug varchar(255) [unique, null, note: 'URL-friendly name']
  name varchar(255) [not null]
  nickname varchar(255)
  role varchar(255)
  image_id bigint  [null, ref: > images.id]
  description text
  long_description longtext
  email varchar(255)
  phone varchar(50)
  birth_date date
  profession varchar(255)
  hobbies text
  jubla_highlight longtext
  created_at timestamp
  updated_at timestamp
}

Table leader_roles {
  id bigint  [pk, increment]
  key varchar(100) [unique, not null]
  label varchar(255) [not null]
  description text
  created_at timestamp
  updated_at timestamp
}

Table leader_role_assignments {
  id bigint  [pk, increment]
  leader_id bigint  [not null, ref: > leaders.id]
  leader_role_id bigint  [not null, ref: > leader_roles.id]
  sort_order int  [default: 0, not null]

  indexes {
    (leader_id, leader_role_id) [unique]
  }
}

Table courses {
  id bigint  [pk, increment]
  key varchar(100) [unique, not null]
  label varchar(255) [not null]
  created_at timestamp
  updated_at timestamp
}

Table leader_course_assignments {
  id bigint  [pk, increment]
  leader_id bigint  [not null, ref: > leaders.id]
  course_id bigint  [not null, ref: > courses.id]
  sort_order int  [default: 0, not null]

  indexes {
    (leader_id, course_id) [unique]
  }
}

Table activities {
  id bigint  [pk, increment]
  slug varchar(255) [unique, null, note: 'URL-friendly name']
  title varchar(255) [not null]
  start_date date [not null]
  end_date date
  short_description text
  long_description longtext
  image_id bigint  [null, ref: > images.id]
  created_at timestamp
  updated_at timestamp
}

Table posts {
  id bigint  [pk, increment]
  slug varchar(255) [unique, null, note: 'URL-friendly name']
  title varchar(255) [not null]
  published_at datetime [not null]
  short_description text
  long_description longtext
  image_id bigint  [null, ref: > images.id]
  user_id bigint  [null, ref: > users.id, note: 'creator user ID']
  created_at timestamp
  updated_at timestamp
}

Table activity_files {
  id bigint  [pk, increment]
  activity_id bigint  [not null, ref: > activities.id]
  file_id bigint  [not null, ref: > files.id]
  sort_order int  [default: 0, not null]

  indexes {
    (activity_id, file_id) [unique]
  }
}

Table post_files {
  id bigint  [pk, increment]
  post_id bigint  [not null, ref: > posts.id]
  file_id bigint  [not null, ref: > files.id]
  sort_order int  [default: 0, not null]

  indexes {
    (post_id, file_id) [unique]
  }
}

Table galleries {
  id bigint  [pk, increment]
  slug varchar(255) [unique, not null]
  event_date date
  cover_image_id bigint  [null, ref: > images.id]
  name varchar(255) [not null]
  description text
  password varchar(255)
  created_at timestamp
  updated_at timestamp
}

Table images {
  id bigint  [pk, increment]
  file_id bigint  [not null, ref: > files.id]
  gallery_id bigint  [null, ref: > galleries.id]
  height int 
  width int
  alt_text varchar(255)
  sort_order int  [default: 0, not null]
  created_at timestamp
  updated_at timestamp
}


Table legal_sections {
  id bigint  [pk, increment]
  page_id bigint  [not null, ref: > pages.id]
  title varchar(255) [null]
  content longtext [not null]
  sort_order int  [default: 0, not null]
  created_at timestamp
  updated_at timestamp
}

Table files {
  id bigint  [pk, increment, note: 'Primary Key']
  uuid varchar(36) [unique, not null, note: 'Unique file identifier']
  name varchar(255) [not null, note: 'Storage name']
  file_name varchar(255) [not null, note: 'Original filename']
  slug varchar(255) [unique, null, note: 'URL-friendly name']
  path varchar(500) [not null, note: 'File path']
  is_public boolean [not null, default: true, note: 'Public access flag']
  mime_type varchar(100) [not null, note: 'MIME type (e.g., image/jpeg)']
  mime_subtype varchar(100) [null, note: 'MIME subtype']
  size bigint  [not null, note: 'Size in bytes']
  user_id bigint  [null, ref: > users.id, note: 'Uploader user ID']
  created_at timestamp
  updated_at timestamp
}


// Relationen
Ref: personal_access_tokens.tokenable_id > users.id
Ref: sessions.user_id > users.id