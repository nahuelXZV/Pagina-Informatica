<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{

    public $plan_estudio = [
        [
            'nivel' => '1',
            'sigla' => 'FIS100',
            'nombre' => 'FISICA I',
            'credito' => 6,
            'requisitos' => '',
            'ht' => '4',
            'hp' => '4',
            'pdf' => 'https://antigua.uagrm.edu.bo/facultades/computacion/files/ProgramasAnaliticosFICCT27-11-2014/FIS100-18-1.pdf'
        ], [
            'nivel' => '1',
            'sigla' => 'INF110',
            'nombre' => 'INTRODUCCION A LA INFORMATICA',
            'credito' => 5,
            'requisitos' => '',
            'ht' => 4,
            'hp' => 2,
            'pdf' => 'https://antigua.uagrm.edu.bo/facultades/computacion/files/ProgramasAnaliticosFICCT27-11-2014/INF110-18-1.pdf'
        ], [
            'nivel' => '1',
            'sigla' => 'INF119',
            'nombre' => 'ESTRUCTURAS DISCRETAS',
            'credito' => 5,
            'requisitos' => '',
            'ht' => '4',
            'hp' => '2',
            'pdf' => 'https://antigua.uagrm.edu.bo/facultades/computacion/files/ProgramasAnaliticosFICCT27-11-2014/INF119-18-1.pdf'
        ], [
            'nivel' => '1',
            'sigla' => 'LIN100',
            'nombre' => 'INGLES TECNICO I',
            'credito' => 4,
            'requisitos' => '',
            'ht' => 3,
            'hp' => 3,
            'pdf' => 'https://antigua.uagrm.edu.bo/facultades/computacion/files/ProgramasAnaliticosFICCT27-11-2014/LIN100-18-1.pdf'
        ], [
            'nivel' => '1',
            'sigla' => 'MAT101',
            'nombre' => 'CALCULO I',
            'credito' => 5,
            'requisitos' => '',
            'ht' => 4,
            'hp' => 2,
            'pdf' => 'https://antigua.uagrm.edu.bo/facultades/computacion/files/ProgramasAnaliticosFICCT27-11-2014/MAT101-18-1.pdf'
        ], [
            'nivel' => '2',
            'sigla' => 'FIS102',
            'nombre' => 'FISICA II',
            'credito' => 6,
            'requisitos' => 'FIS100',
            'ht' => '4',
            'hp' => '4',
            'pdf' => 'https://antigua.uagrm.edu.bo/facultades/computacion/files/ProgramasAnaliticosFICCT27-11-2014/FIS102-18-1.pdf'
        ], [
            'nivel' => '2',
            'sigla' => 'INF120',
            'nombre' => 'PROGRAMACION I',
            'credito' => 5,
            'requisitos' => 'INF110',
            'ht' => '4',
            'hp' => '2',
            'pdf' => 'https://antigua.uagrm.edu.bo/facultades/computacion/files/ProgramasAnaliticosFICCT27-11-2014/INF120-18-1.pdf'
        ], [
            'nivel' => '2',
            'sigla' => 'LIN101',
            'nombre' => 'INGLES TECNICO II',
            'credito' => 4,
            'requisitos' => 'LIN100',
            'ht' => '3',
            'hp' => '3',
            'pdf' => 'https://antigua.uagrm.edu.bo/facultades/computacion/files/ProgramasAnaliticosFICCT27-11-2014/LIN101-18-1.pdf'
        ], [
            'nivel' => '2',
            'sigla' => 'MAT102',
            'nombre' => 'CALCULO II',
            'credito' => '5',
            'requisitos' => 'MAT101',
            'ht' => '4',
            'hp' => '2',
            'pdf' => 'https://antigua.uagrm.edu.bo/facultades/computacion/files/ProgramasAnaliticosFICCT27-11-2014/MAT102-18-1.pdf'
        ], [
            'nivel' => '2',
            'sigla' => 'MAT103',
            'nombre' => 'ALGEBRA LINEAL',
            'credito' => 5,
            'requisitos' => 'INF119',
            'ht' => 4,
            'hp' => 2,
            'pdf' => 'https://antigua.uagrm.edu.bo/facultades/computacion/files/ProgramasAnaliticosFICCT27-11-2014/MAT103-18-1.pdf'
        ], [
            'nivel' => '3',
            'sigla' => 'ADM100',
            'nombre' => 'ADMINISTRACION',
            'credito' => '4',
            'requisitos' => '',
            'ht' => '3',
            'hp' => '3',
            'pdf' => 'https://antigua.uagrm.edu.bo/facultades/computacion/files/ProgramasAnaliticosFICCT27-11-2014/ADM100-18-1.pdf'
        ], [
            'nivel' => '3',
            'sigla' => 'INF210',
            'nombre' => 'PROGRAMACION II',
            'credito' => '5',
            'requisitos' => 'MAT103 INF120',
            'ht' => '4',
            'hp' => '2',
            'pdf' => 'https://antigua.uagrm.edu.bo/facultades/computacion/files/ProgramasAnaliticosFICCT27-11-2014/INF210-18-1.pdf'
        ], [
            'nivel' => '3',
            'sigla' => 'INF211',
            'nombre' => 'ARQUITECTURA DE COMPUTADORAS',
            'credito' => '5',
            'requisitos' => 'INF120 FIS102',
            'ht' => '4',
            'hp' => '2',
            'pdf' => 'https://antigua.uagrm.edu.bo/facultades/computacion/files/ProgramasAnaliticosFICCT27-11-2014/INF211-18-1.pdf'
        ], [
            'nivel' => '3',
            'sigla' => 'MAT207',
            'nombre' => 'ECUACIONES DIFERENCIALES',
            'credito' => '5',
            'requisitos' => 'MAT102',
            'ht' => '4',
            'hp' => '2',
            'pdf' => 'https://antigua.uagrm.edu.bo/facultades/computacion/files/ProgramasAnaliticosFICCT27-11-2014/MAT207-18-1.pdf'
        ], [
            'nivel' => '3',
            'sigla' => 'FIS200',
            'nombre' => 'FISICA III',
            'credito' => '6',
            'requisitos' => 'FIS102',
            'ht' => '4',
            'hp' => '4',
            'pdf' => 'https://antigua.uagrm.edu.bo/facultades/computacion/files/ProgramasAnaliticosFICCT27-11-2014/FIS200-18-1.pdf'
        ], [
            'nivel' => '4',
            'sigla' => 'ADM200',
            'nombre' => 'CONTABILIDAD',
            'credito' => '4',
            'requisitos' => 'ADM100',
            'ht' => '3',
            'hp' => '2',
            'pdf' => 'https://antigua.uagrm.edu.bo/facultades/computacion/files/ProgramasAnaliticosFICCT27-11-2014/ADM200-18-1.pdf'
        ], [
            'nivel' => '4',
            'sigla' => 'INF220',
            'nombre' => 'ESTRUCTURA DE DATOS I',
            'credito' => '5',
            'requisitos' => 'MAT101 INF210',
            'ht' => '4',
            'hp' => '2',
            'pdf' => 'https://antigua.uagrm.edu.bo/facultades/computacion/files/ProgramasAnaliticosFICCT27-11-2014/INF220-18-1.pdf'
        ], [
            'nivel' => '4',
            'sigla' => 'INF221',
            'nombre' => 'PROGRAMACION ENSAMBLADOR',
            'credito' => '5',
            'requisitos' => 'INF211',
            'ht' => '4',
            'hp' => '2',
            'pdf' => 'https://antigua.uagrm.edu.bo/facultades/computacion/files/ProgramasAnaliticosFICCT27-11-2014/INF221-18-1.pdf'
        ], [
            'nivel' => '4',
            'sigla' => 'MAT202',
            'nombre' => 'PROBABILIDADES Y ESTADIST.I',
            'credito' => '5',
            'requisitos' => 'MAT102',
            'ht' => '4',
            'hp' => '2',
            'pdf' => 'https://antigua.uagrm.edu.bo/facultades/computacion/files/ProgramasAnaliticosFICCT27-11-2014/MAT202-18-1.pdf'
        ], [
            'nivel' => '4',
            'sigla' => 'MAT205',
            'nombre' => 'METODOS NUMERICOS',
            'credito' => '5',
            'requisitos' => 'MAT207',
            'ht' => '4',
            'hp' => '2',
            'pdf' => 'https://antigua.uagrm.edu.bo/facultades/computacion/files/ProgramasAnaliticosFICCT27-11-2014/MAT205-18-1.pdf'
        ], [
            'nivel' => '5',
            'sigla' => 'INF310',
            'nombre' => 'ESTRUCTURAS DE DATOS II',
            'credito' => '5',
            'requisitos' => 'INF220',
            'ht' => '4',
            'hp' => '2',
            'pdf' => 'https://antigua.uagrm.edu.bo/facultades/computacion/files/ProgramasAnaliticosFICCT27-11-2014/INF310-18-1.pdf'
        ], [
            'nivel' => '5',
            'sigla' => 'INF312',
            'nombre' => 'BASE DE DATOS I',
            'credito' => '5',
            'requisitos' => 'INF220',
            'ht' => '4',
            'hp' => '2',
            'pdf' => 'https://antigua.uagrm.edu.bo/facultades/computacion/files/ProgramasAnaliticosFICCT27-11-2014/INF312-18-1.pdf'
        ], [
            'nivel' => '5',
            'sigla' => 'INF318',
            'nombre' => 'PROGRAMAC.LOGICA Y FUNCIONAL',
            'credito' => '5',
            'requisitos' => 'INF220',
            'ht' => '4',
            'hp' => '2',
            'pdf' => 'https://antigua.uagrm.edu.bo/facultades/computacion/files/ProgramasAnaliticosFICCT27-11-2014/INF318-18-1.pdf'
        ], [
            'nivel' => '5',
            'sigla' => 'INF319',
            'nombre' => 'LENGUAJES FORMALES',
            'credito' => '5',
            'requisitos' => 'INF220',
            'ht' => '4',
            'hp' => '2',
            'pdf' => 'https://antigua.uagrm.edu.bo/facultades/computacion/files/ProgramasAnaliticosFICCT27-11-2014/INF319-18-1.pdf'
        ], [
            'nivel' => '5',
            'sigla' => 'MAT302',
            'nombre' => 'PROBABILIDADES Y ESTADISTICAS II',
            'credito' => '5',
            'requisitos' => 'MAT202',
            'ht' => '4',
            'hp' => '2',
            'pdf' => 'https://antigua.uagrm.edu.bo/facultades/computacion/files/ProgramasAnaliticosFICCT27-11-2014/MAT302-18-1.pdf'
        ], [
            'nivel' => '6',
            'sigla' => 'INF322',
            'nombre' => 'BASES DE DATOS II',
            'credito' => '5',
            'requisitos' => 'INF312',
            'ht' => '4',
            'hp' => '2',
            'pdf' => 'https://antigua.uagrm.edu.bo/facultades/computacion/files/ProgramasAnaliticosFICCT27-11-2014/INF322-18-1.pdf'
        ], [
            'nivel' => '6',
            'sigla' => 'INF323',
            'nombre' => 'SISTEMAS OPERATIVOS I',
            'credito' => '5',
            'requisitos' => 'INF310',
            'ht' => '4',
            'hp' => '2',
            'pdf' => 'https://antigua.uagrm.edu.bo/facultades/computacion/files/ProgramasAnaliticosFICCT27-11-2014/INF323-18-1.pdf'
        ], [
            'nivel' => '6',
            'sigla' => 'INF329',
            'nombre' => 'COMPILADORES',
            'credito' => '5',
            'requisitos' => 'INF310 INF319',
            'ht' => '4',
            'hp' => '2',
            'pdf' => 'https://antigua.uagrm.edu.bo/facultades/computacion/files/ProgramasAnaliticosFICCT27-11-2014/INF329-18-1.pdf'
        ], [
            'nivel' => '6',
            'sigla' => 'INF342',
            'nombre' => 'SISTEMAS DE INFORMACION I',
            'credito' => '5',
            'requisitos' => 'INF312',
            'ht' => '4',
            'hp' => '2',
            'pdf' => 'https://antigua.uagrm.edu.bo/facultades/computacion/files/ProgramasAnaliticosFICCT27-11-2014/INF342-18-1.pdf'
        ], [
            'nivel' => '6',
            'sigla' => 'MAT329',
            'nombre' => 'INVESTIG. OPERATIVA I',
            'credito' => '5',
            'requisitos' => 'MAT302',
            'ht' => '4',
            'hp' => '2',
            'pdf' => 'https://antigua.uagrm.edu.bo/facultades/computacion/files/ProgramasAnaliticosFICCT27-11-2014/MAT329-18-1.pdf'
        ], [
            'nivel' => '7',
            'sigla' => 'INF412',
            'nombre' => 'SISTEMAS DE INFORMACION II',
            'credito' => '5',
            'requisitos' => 'INF342 INF322',
            'ht' => '4',
            'hp' => '2',
            'pdf' => 'https://antigua.uagrm.edu.bo/facultades/computacion/files/ProgramasAnaliticosFICCT27-11-2014/INF412-18-1.pdf'
        ], [
            'nivel' => '7',
            'sigla' => 'INF413',
            'nombre' => 'SISTEMAS OPERATIVOS II',
            'credito' => '5',
            'requisitos' => 'INF323',
            'ht' => '4',
            'hp' => '2',
            'pdf' => 'https://antigua.uagrm.edu.bo/facultades/computacion/files/ProgramasAnaliticosFICCT27-11-2014/INF413-18-1.pdf'
        ], [
            'nivel' => '7',
            'sigla' => 'INF418',
            'nombre' => 'INTELIGENCIA ARTIFICIAL',
            'credito' => '5',
            'requisitos' => 'INF310 INF318',
            'ht' => '4',
            'hp' => '2',
            'pdf' => 'https://antigua.uagrm.edu.bo/facultades/computacion/files/ProgramasAnaliticosFICCT27-11-2014/INF418-18-1.pdf'
        ], [
            'nivel' => '7',
            'sigla' => 'INF433',
            'nombre' => 'REDES I',
            'credito' => '5',
            'requisitos' => 'INF323',
            'ht' => '4',
            'hp' => '2',
            'pdf' => 'https://antigua.uagrm.edu.bo/facultades/computacion/files/ProgramasAnaliticosFICCT27-11-2014/INF433-18-1.pdf'
        ], [
            'nivel' => '7',
            'sigla' => 'MAT419',
            'nombre' => 'INVESTIGAC.OPERATIVA II',
            'credito' => '5',
            'requisitos' => 'MAT329',
            'ht' => '4',
            'hp' => '2',
            'pdf' => 'https://antigua.uagrm.edu.bo/facultades/computacion/files/ProgramasAnaliticosFICCT27-11-2014/MAT419-18-1.pdf'
        ], [
            'nivel' => '8',
            'sigla' => 'ECO449',
            'nombre' => 'PREPARAC.Y EVALUAC.DE PROYECTOS',
            'credito' => '5',
            'requisitos' => 'MAT419',
            'ht' => '4',
            'hp' => '2',
            'pdf' => 'https://antigua.uagrm.edu.bo/facultades/computacion/files/ProgramasAnaliticosFICCT27-11-2014/ECO449-18-1.pdf'
        ], [
            'nivel' => '8',
            'sigla' => 'INF422',
            'nombre' => 'INGENIERIA DE SOFTWARE I',
            'credito' => '5',
            'requisitos' => 'INF412',
            'ht' => '4',
            'hp' => '2',
            'pdf' => 'https://antigua.uagrm.edu.bo/facultades/computacion/files/ProgramasAnaliticosFICCT27-11-2014/INF422-18-1.pdf'
        ], [
            'nivel' => '8',
            'sigla' => 'INF423',
            'nombre' => 'REDES II',
            'credito' => '5',
            'requisitos' => 'INF433',
            'ht' => '4',
            'hp' => '2',
            'pdf' => 'https://antigua.uagrm.edu.bo/facultades/computacion/files/ProgramasAnaliticosFICCT27-11-2014/INF423-18-1.pdf'
        ], [
            'nivel' => '8',
            'sigla' => 'INF428',
            'nombre' => 'SISTEMAS EXPERTOS',
            'credito' => '5',
            'requisitos' => 'INF412 INF418',
            'ht' => '4',
            'hp' => '2',
            'pdf' => 'https://antigua.uagrm.edu.bo/facultades/computacion/files/ProgramasAnaliticosFICCT27-11-2014/INF428-18-1.pdf'
        ], [
            'nivel' => '8',
            'sigla' => 'INF442',
            'nombre' => 'SISTEMAS DE INFORM.GEOGRAFICA',
            'credito' => '4',
            'requisitos' => 'INF412',
            'ht' => '4',
            'hp' => '2',
            'pdf' => 'https://antigua.uagrm.edu.bo/facultades/computacion/files/ProgramasAnaliticosFICCT27-11-2014/INF442-18-1.pdf'
        ], [
            'nivel' => '9',
            'sigla' => 'INF511',
            'nombre' => 'TALLER DE GRADO I',
            'credito' => '5',
            'requisitos' => 'INF423 INF422 INF442 INF428 ECO449',
            'ht' => '4',
            'hp' => '2',
            'pdf' => 'https://antigua.uagrm.edu.bo/facultades/computacion/files/ProgramasAnaliticosFICCT27-11-2014/INF511-18-1.pdf'
        ], [
            'nivel' => '9',
            'sigla' => 'INF512',
            'nombre' => 'INGENIERIA DE SOFTWARE II',
            'credito' => '5',
            'requisitos' => 'INF423 INF422 INF442 INF428 ECO449',
            'ht' => '4',
            'hp' => '2',
            'pdf' => 'https://antigua.uagrm.edu.bo/facultades/computacion/files/ProgramasAnaliticosFICCT27-11-2014/INF512-18-1.pdf'
        ], [
            'nivel' => '9',
            'sigla' => 'INF513',
            'nombre' => 'TECNOLOGIA WEB',
            'credito' => '5',
            'requisitos' => 'INF423 INF422 INF442 INF428 ECO449',
            'ht' => '4',
            'hp' => '2',
            'pdf' => 'https://antigua.uagrm.edu.bo/facultades/computacion/files/ProgramasAnaliticosFICCT27-11-2014/INF513-18-1.pdf'
        ], [
            'nivel' => '9',
            'sigla' => 'INF552',
            'nombre' => 'ARQUITECTURA DEL SOFTWARE',
            'credito' => '4',
            'requisitos' => 'INF423 INF422 INF442 INF428 ECO449',
            'ht' => '3',
            'hp' => '3',
            'pdf' => 'https://antigua.uagrm.edu.bo/facultades/computacion/files/ProgramasAnaliticosFICCT27-11-2014/INF552-18-1.pdf'
        ], [
            'nivel' => '10',
            'sigla' => 'GRL001',
            'nombre' => 'MODALIDAD DE GRADUACION',
            'credito' => '5',
            'requisitos' => 'INF511 INF512 INF513 INF552',
            'ht' => '4',
            'hp' => '2',
            'pdf' => 'https://antigua.uagrm.edu.bo/facultades/computacion/files/ProgramasAnaliticosFICCT27-11-2014/GRL001-18-1.pdf'
        ], [
            'nivel' => 'ELECTIVA',
            'sigla' => 'ELC101',
            'nombre' => 'MODELADO Y SIMULACION DE SISTEMAS',
            'credito' => '3',
            'requisitos' => '',
            'ht' => '2',
            'hp' => '2',
            'pdf' => 'https://antigua.uagrm.edu.bo/facultades/computacion/files/ProgramasAnaliticosFICCT27-11-2014/ELC101-18-1.pdf'
        ], [
            'nivel' => 'ELECTIVA',
            'sigla' => 'ELC102',
            'nombre' => 'PROGRAMACION GRAFICA',
            'credito' => '3',
            'requisitos' => '',
            'ht' => '2',
            'hp' => '1',
            'pdf' => 'https://antigua.uagrm.edu.bo/facultades/computacion/files/ProgramasAnaliticosFICCT27-11-2014/ELC102-18-1.pdf'
        ], [
            'nivel' => 'ELECTIVA',
            'sigla' => 'ELC103',
            'nombre' => 'TOPIC.AVANZ.DE PROGRAMAC.(ALGORIT.GENE.)',
            'credito' => '3',
            'requisitos' => '',
            'ht' => '2',
            'hp' => '2',
            'pdf' => 'https://antigua.uagrm.edu.bo/facultades/computacion/files/ProgramasAnaliticosFICCT27-11-2014/ELC103-18-1.pdf'
        ], [
            'nivel' => 'ELECTIVA',
            'sigla' => 'ELC104',
            'nombre' => 'PROGRAMAC.DE APLICAC.DE TIEMPO REAL',
            'credito' => '3',
            'requisitos' => '',
            'ht' => '2',
            'hp' => '2',
            'pdf' => 'https://antigua.uagrm.edu.bo/facultades/computacion/files/ProgramasAnaliticosFICCT27-11-2014/ELC104-18-1.pdf'
        ], [
            'nivel' => 'ELECTIVA',
            'sigla' => 'ELC105',
            'nombre' => 'SISTEMAS DISTRIBUIDOS',
            'credito' => '3',
            'requisitos' => '',
            'ht' => '2',
            'hp' => '2',
            'pdf' => 'https://antigua.uagrm.edu.bo/facultades/computacion/files/ProgramasAnaliticosFICCT27-11-2014/ELC105-18-1.pdf'
        ], [
            'nivel' => 'ELECTIVA',
            'sigla' => 'ELC106',
            'nombre' => 'INTERACCION HOMBRE-COMPUTADOR',
            'credito' => '3',
            'requisitos' => '',
            'ht' => '2',
            'hp' => '2',
            'pdf' => 'https://antigua.uagrm.edu.bo/facultades/computacion/files/ProgramasAnaliticosFICCT27-11-2014/ELC106-18-1.pdf'
        ]
    ];

    public function acerca()
    {
        return view('pages.acercade');
    }

    public function noticias()
    {
        return view('pages.noticias');
    }

    public function tramites()
    {
        return view('pages.tramites');
    }

    public function plan_estudio()
    {
        return view('pages.plan_estudio', [
            'plan_estudio' => $this->plan_estudio,
        ]);
    }
}
