PROGRAM SarahRevere(INPUT, OUTPUT);
USES 
  DOS;
VAR
  Query: STRING;
  ParamPos: BYTE;
  Lanterns: STRING;   
BEGIN { SarahRevere }
  Query := GetEnv('QUERY_STRING');
  ParamPos := Pos('Lanterns', Query);
  Lanterns := Copy(Query, ParamPos+9, length(Query));
  WRITELN('Content-Type: text/plain');
  WRITELN;
  IF NOT(ParamPos = 0)
  THEN
    IF Lanterns = '1'
    THEN
      WRITELN('The british are coming by land')
    ELSE
      IF Lanterns = '2'
      THEN
        WRITELN('The british are coming by sea')
      ELSE
        WRITELN('The North Church shows only ''', Lanterns,'''.')
  ELSE
   WRITELN('Lanterns = undefined')
END. { SarahRever }
                               
