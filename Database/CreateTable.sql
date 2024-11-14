Create table if not exists Users
(
	UserId int Primary Key Not Null Auto_increment,
    Username varchar(50) Not Null,
    ProfileName varchar(50), 
    Email varchar(100) not null,
    Password varchar(255) Not Null,
    Country varchar(50),
    CreateAt timestamp Default Current_timestamp,
    IsVerified boolean Default false,
    Role enum('admin', 'user') Default 'user'
);

Create table if not exists Apps
(
	AppId int Primary Key Not Null Auto_increment,
    Type varchar(30) Not Null,
    Title varchar(255) Not Null,
    Description Text,
    Price decimal(5, 2) Not Null,
    Discount int Default 0,
    DiscountStart timestamp Null,
    DiscountEnd timestamp Null,
    ReleaseDate Date,
    Developer varchar(255),
    Publisher varchar(255),
    Platform varchar(50),
    Rating decimal(3,2),
    CreateAt timestamp Default current_timestamp
);

Create table if not exists Categories
(
	CategoryId int Primary Key Not Null Auto_increment,
    Name varchar(100),
    Description text
);

Create table if not exists AppCategories
(
	CategoryId int,
    AppId int,
    Foreign key (CategoryId) references Categories(CategoryId),
    Foreign key (AppId) references Apps(AppId)
);

Create table if not exists Orders
(
	OrderId int Primary Key Not Null Auto_increment,
    UserId int,
    OrderDate timestamp default current_timestamp,
    TotalPrice decimal(10,2),
    Status varchar(20) Default 'pending',
    Foreign key (UserId) references Users(UserId)
);

Create table if not exists OrderDetail
(
	OrderId int,
    AppId int,
    UnitPrice DECIMAL(10,2) Not Null,
    IsGift boolean default false,
    Primary Key (OrderId, AppId),
    Foreign key (OrderId) references Orders(OrderId),
    Foreign key (AppId) references Apps(AppId)
);

Create table if not exists Reviews
(
	ReviewID int Primary Key Not Null Auto_increment,
    UserID int,
    AppId int,
    Rating int Check (Rating >= 1 and Rating <=5),
    Comment varchar(8000),
    IsRecommended boolean Not Null,
    CreateAt timestamp Default current_timestamp,
	Foreign key (UserID) references Users(UserID),
    Foreign key (AppId) references Apps(AppId)
);

Create table if not exists ReviewReactions
(
	ReactionId int Primary Key Not Null Auto_increment,
    UserID int,
    ReviewID int,
    ReactionType ENUM('like', 'dislike'),
	Foreign key (UserID) references Users(UserID),
    Foreign key (ReviewID) references Reviews(ReviewID)
);

Create table if not exists Gifts
(
	GiftId int Primary Key Not Null Auto_increment,
    SenderId int,
    ReceiverId int,
    AppId int,
    OrderId int,
    Message varchar(255),
	Foreign key (SenderId) references Users(UserId),
    Foreign key (ReceiverId) references Users(UserId),
    Foreign key (AppId) references Apps(AppId),
    Foreign key (OrderId) references Orders(OrderId)
);

Create table if not exists Wishlist 
(
	UserId int,
    AppId int,
    AddedAt Date,
	PRIMARY KEY (UserId, AppId),
	Foreign key (UserId) references Users(UserId),
    Foreign key (AppId) references Apps(AppId)
);

Create table if not exists Cart
(
	UserId int,
    AppId int,
    IsGift boolean,
    PRIMARY KEY (UserId, AppId),
	Foreign key (UserId) references Users(UserId),
    Foreign key (AppId) references Apps(AppId)
);

Create table if not exists Library
(
	UserId int,
    AppId int,
    PRIMARY KEY (UserId, AppId),
    LastPlayed Date,
    PlayTime varchar(20),
	Foreign key (UserId) references Users(UserId),
    Foreign key (AppId) references Apps(AppId)
);

Create table if not exists Achievements
(
	AchievementId int Primary Key Not Null Auto_increment,
    AppId int,
    AchievementName varchar(255),
    Description text,
	Foreign key (AppId) references Apps(AppId)
);

Create table if not exists UserAchievements
(
	AchievementId int Primary Key Not Null Auto_increment,
	UserId int,
    AchievedAt TIMESTAMP,
	Foreign key (UserId) references Users(UserId)
);