CREATE TABLE UserAccount
(
UserID  int(11)  Not Null,
FirstName varchar(255)  Not Null,
LastName varchar(255)  Not Null,
Email   varchar(255),
Username varchar(255),  
PRIMARY KEY (UserID)
);

CREATE TABLE Project
(
ProjectID int(11) Not Null,
ProjectName varchar(255) Not Null,
PRIMARY KEY (ProjectID)
);

CREATE TABLE Task
(
TaskID int(11) Not Null,
TaskName varchar(255) Not Null,
ProjectID int (11) Not Null,
PRIMARY KEY (TaskID),
CONSTRAINT fk_ProjectTask FOREIGN KEY (ProjectID)REFERENCES Project(ProjectID)
);


CREATE TABLE ProjectAssign
(
AssignID int(11) Not Null,
UserID int(11) Not Null,
ProjectID int(11) Not Null,
PRIMARY KEY (AssignID),
CONSTRAINT fk_ProjectAssignToMember FOREIGN KEY (UserID)REFERENCES UserAccount(UserID),
CONSTRAINT fk_ProjectAssignToProject FOREIGN KEY (ProjectID)REFERENCES Project(ProjectID)
);