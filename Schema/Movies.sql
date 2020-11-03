use moviepass;

create table if not EXISTS Cinema(id integer AUTO_INCREMENT,
        name varchar(100),
        address varchar(200),
        price float,
        CONSTRAINT PK_CINEMAS PRIMARY KEY (ID),
        CONSTRAINT UK_CINEMA_NAME UNIQUE (NAME));
        
        
create table if not EXISTS Room(id integer AUTO_INCREMENT,
        name varchar(50),
        capacity integer,
        cinemaId integer,
        CONSTRAINT PK_ROOMS PRIMARY KEY (ID),
        CONSTRAINT UK_ROOM_NAME UNIQUE (CINEMAID, NAME),
        CONSTRAINT FK_Room_CINEMA FOREIGN KEY (CINEMAID) REFERENCES CINEMA(ID));
        
create table if not EXISTS Movie(id integer AUTO_INCREMENT,
        title varchar(100),
        posterPath varchar(200),
        language varchar(20),
        overview varchar(2000),
        releaseDate timestamp,
        CONSTRAINT PK_MOVIES PRIMARY KEY (ID),
        CONSTRAINT UK_MOVIE_TITLE UNIQUE (TITLE));
        
        
create table if not EXISTS Showtime(
        id integer AUTO_INCREMENT,
        showtimeDate DATE,
        showtimeTime TIME,
        movieId integer,
        roomId integer,
        CONSTRAINT PK_SHOWTIME_ID PRIMARY KEY (ID),
        CONSTRAINT FK_Showtime_CINEMA FOREIGN KEY (MOVIEID) REFERENCES MOVIE(ID),
        CONSTRAINT FK_showtime_ROOM FOREIGN KEY (ROOMID) REFERENCES ROOM(ID));