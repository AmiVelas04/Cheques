create trigger creacion_cheque 
	after insert on cheque
		for each row	
begin 
		declare usuar

		select usu.nombre from usuario where usu.id_usu= new.libero into usuar;

		insert into bitacora(id_bitacora,fecha,detalle)
		values(new.id_bitacora,now(),"Se creo unuevo cheque con estado:" + new.estado + "por: " + usuar );
end;
		