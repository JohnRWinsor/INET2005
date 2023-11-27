-- Create Teachers table
CREATE TABLE Teachers (
    TeacherID INT PRIMARY KEY,
    FirstName VARCHAR(255),
    LastName VARCHAR(255)
);

-- Create Courses table
CREATE TABLE Courses (
    CourseID INT PRIMARY KEY,
    CourseName VARCHAR(255)
);

-- Create Rooms table
CREATE TABLE Rooms (
    RoomID INT PRIMARY KEY,
    RoomNumber VARCHAR(10)
);

-- Create Teaches relationship table
CREATE TABLE Teacher (
    TeacherID INT,
    CourseID INT,
    FOREIGN KEY (TeacherID) REFERENCES Teachers(TeacherID),
    FOREIGN KEY (CourseID) REFERENCES Courses(CourseID),
    PRIMARY KEY (TeacherID, CourseID)
);

-- Create Schedule relationship table
CREATE TABLE Schedule (
    CourseID INT,
    RoomID INT,
    FOREIGN KEY (CourseID) REFERENCES Courses(CourseID),
    FOREIGN KEY (RoomID) REFERENCES Rooms(RoomID),
    PRIMARY KEY (CourseID, RoomID)
);

-- Insert sample data into Teachers table
INSERT INTO Teachers (TeacherID, FirstName, LastName) VALUES
(1, 'John', 'Doe'),
(2, 'Jane', 'Smith');

-- Insert sample data into Courses table
INSERT INTO Courses (CourseID, CourseName) VALUES
(1, 'Mathematics'),
(2, 'History' );

-- Insert sample data into Rooms table
INSERT INTO Rooms (RoomID, RoomNumber) VALUES
(1, 115),
(2, 115);

-- Insert sample data into Teaches relationship table
INSERT INTO Teaches (TeacherID, CourseID) VALUES
(1, 1),
(2, 2);

-- Insert sample data into Scheduled relationship table
INSERT INTO Scheduled (CourseID, RoomID) VALUES
(1, 1),
(2, 2);