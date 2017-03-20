# tictactoe
PHP CLI snippet

Instructions
============
1. Clone or Download and unzip the project
2. Execute "chmod +x tictactoe.php" to make the file executable
3. Execute the program by the command "./tictactoe.php"

## Motivation of this exercise
This program was designed for testing purposes for a job offer.

### Text of the exercise

#### TIC TAC TOE as a service

Our frontend team is planning to add a multi-user, distributed, TIC TAC TOE game to the web and they have requested us, the PHP team, to implement certain use cases.
In the future it will be ‘consumed’ via an API, but we don’t need an API interface yet.

We don’t know what kind of persistency we’ll use (relational database, no-sql….) and the code doesn’t need to store anything yet, but it should be prepared to save the users and games played. You can use mock-ups in order to test that everything is working.

The use cases that we need to implement are:
- Create users
- Delete users
- Start a new game between two users
- A user doing a move in a game
- To know if a game has finished and if there is a winner

What we ask you to do is to implement a set of classes / interfaces in PHP that implement those use cases and that can be run from the command line, having in mind that in the future we will use it via API.

**Notes:**
The specifications are vague because we don’t have all the information from the all stakeholders. We don’t know what properties has a ‘user’ or a ‘game’ yet. What we know is that it should be easy to add extra features in the future.
