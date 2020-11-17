USE moviepass;

CREATE TABLE IF NOT EXISTS Cinema(id INTEGER AUTO_INCREMENT,
        NAME VARCHAR(100),
        address VARCHAR(200),
        price FLOAT,
        CONSTRAINT PK_CINEMAS PRIMARY KEY (ID),
        CONSTRAINT UK_CINEMA_NAME UNIQUE (NAME));
     
CREATE TABLE IF NOT EXISTS Room(id INTEGER AUTO_INCREMENT,
        NAME VARCHAR(50),
        capacity INTEGER,
        cinemaId INTEGER,
        CONSTRAINT PK_ROOMS PRIMARY KEY (ID),
        CONSTRAINT UK_ROOM_NAME UNIQUE (CINEMAID, NAME),
        CONSTRAINT FK_Room_CINEMA FOREIGN KEY (CINEMAID) REFERENCES CINEMA(ID)  ON DELETE CASCADE) ;
        
CREATE TABLE IF NOT EXISTS Movie(id INTEGER AUTO_INCREMENT,
        title VARCHAR(100),
        posterPath VARCHAR(200),
        LANGUAGE VARCHAR(20),
        overview VARCHAR(2000),
        releaseDate TIMESTAMP,
        CONSTRAINT PK_MOVIES PRIMARY KEY (ID),
        CONSTRAINT UK_MOVIE_TITLE UNIQUE (TITLE));
           
CREATE TABLE IF NOT EXISTS Showtime(
        id INTEGER AUTO_INCREMENT,
        showtimeDate DATE,
        showtimeTime TIME,
        movieId INTEGER,
        roomId INTEGER,
        CONSTRAINT PK_SHOWTIME_ID PRIMARY KEY (ID),
        CONSTRAINT FK_Showtime_MOVIE FOREIGN KEY (MOVIEID) REFERENCES MOVIE(ID) ON DELETE CASCADE,
        CONSTRAINT FK_showtime_ROOM FOREIGN KEY (ROOMID) REFERENCES ROOM(ID) ON DELETE CASCADE);

CREATE TABLE IF NOT EXISTS GENRE(
        id INTEGER,
        NAME VARCHAR(30),
        CONSTRAINT PK_GENRE_ID PRIMARY KEY (ID));

CREATE TABLE IF NOT EXISTS MOVIE_GENRE(
        movieId INTEGER,
        genreId INTEGER,
        CONSTRAINT PK_MOVIE_GENRE_ID UNIQUE KEY (MOVIEID,genreId),
        CONSTRAINT FK_MG_MOVIEID FOREIGN KEY(MOVIEID) REFERENCES MOVIE(ID) ON DELETE CASCADE,
        CONSTRAINT FK_MG_GENREID FOREIGN KEY(GENREID) REFERENCES GENRE(ID) ON DELETE CASCADE);

CREATE TABLE IF NOT EXISTS OPERATION(
        id INTEGER AUTO_INCREMENT,
        cant_entradas INTEGER,
        operationDate DATE,
        total FLOAT,
        userId INTEGER,
        CONSTRAINT PK_OPERATION_ID PRIMARY KEY (ID),
        CONSTRAINT FK_OP_USERID FOREIGN KEY(USERID) REFERENCES USERS(ID_user) ON DELETE CASCADE);

CREATE TABLE IF NOT EXISTS TICKETS(
        id INTEGER AUTO_INCREMENT,
        ticketRow INTEGER,
        ticketColumn INTEGER,
        showtimeId INTEGER,
        operationId INTEGER,
        CONSTRAINT PK_TICKET_ID PRIMARY KEY (id),
        CONSTRAINT FK_TK_SHOWTIMEID FOREIGN KEY(SHOWTIMEID) REFERENCES SHOWTIME(ID) ON DELETE CASCADE,
        CONSTRAINT FK_TK_OPERATIONID FOREIGN KEY(OPERATIONID) REFERENCES OPERATION(ID) ON DELETE CASCADE); 