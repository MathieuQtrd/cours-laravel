<?php 

// Table projects
//---------------
// id           PK AI
// title        VARCHAR 255
// description  TEXT
// owner_id     FK => users
// status       enum
// client_id    FK => users
// created_at
// updated_at

// Table tasks
//------------
// id           PK AI
// title        VARCHAR 255
// description  TEXT
// project_id   FK => projects
// assigned_to  FK => users
// status       enum
// created_at
// updated_at

// Table project_user
//-------------------
// id           PK AI
// project_id   FK => projects
// user_id      FK => users
// created_at
// updated_at
