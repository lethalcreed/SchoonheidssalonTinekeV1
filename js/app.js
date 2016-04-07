function cleanUserInput($input) {
    return mysql_real_escape_string($input);
}