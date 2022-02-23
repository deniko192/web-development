PROGRAM WorkWithQueryString(INPUT, OUTPUT);
USES DOS;
FUNCTION GetQueryStringParameter(Key: STRING): STRING;
VAR
  QueryPos, StartPos, EndPos: BYTE;
  Query, TempQuery: STRING;
BEGIN
  Query := GetEnv('QUERY_STRING');
  QueryPos := Pos(Key, Query);
  IF QueryPos = 0
  THEN
    GetQueryStringParameter := ''
  ELSE
    StartPos := Pos(Key, Query) + length(Key) + 1;
    TempQuery := Copy(Query, StartPos, length(Query));
    EndPos := Pos('&', TempQuery);
    IF EndPos = 0
    THEN
      EndPos := length(TempQuery)
    ELSE
      EndPos := EndPos - 1;
    GetQueryStringParameter := Copy(TempQuery, 1, EndPos);
END;
BEGIN {WorkWithQueryString}
  WRITELN('Content-Type: text/plain');
  WRITELN;
  WRITELN('First Name:', GetQueryStringParameter('first_name'));
  WRITELN('Last Name:', GetQueryStringParameter('last_name')); 
  WRITELN('Age:', GetQueryStringParameter('age'))
END. {WorkWithQueryString}
  
