PROGRAM Hello(INPUT, OUTPUT);
USES 
  DOS;
VAR
  Query, Name: STRING;
  ParamPos: BYTE;  
BEGIN { Hello }
  Query := GetEnv('QUERY_STRING');
  ParamPos := Pos('name', Query);
  WRITELN('Content-Type: text/plain');
  WRITELN;
  IF ParamPos = 0
  THEN
    Name := 'Anonymous'
  ELSE
    Name := 'dear, ' + Copy(Query, 6, length(Query));
  WRITELN('Hello ', Name, '!')
END. { Hello }
                               
