const ErrorsConfig = {
	document: {
		configRequired: {
			type: ReferenceError,
			msg: 'Data was not setted on DocumentsConfig. More info: '
		},
    configNotFound: {
      type: ReferenceError,
      msg: 'The required config was not found on DocumentsConfig. More info: '
    },
    fieldNotFound: {
      type: Error,
      msg: 'Maybe you forgot to add this tag of the required field... More info: '
    }
	}

};

export default ErrorsConfig;

/*
O construtor de Error cria um objeto de erro. Instâncias de objetos Error são lançadas quando erros de tempo de execução ocorrem. O objeto Error também pode ser usado como objeto base para exceções definidas pelo usuário. Veja abaixo tipos de erro padrões embutidos.

SintaxeEDIT
new Error([message[, fileName[, lineNumber]]])
Parâmetros

message
Opcional. Descrição do erro legível para humanos.
fileName 
Opcional. O valor da propriedade fileName  no objeto de erro criado. O padrão é o nome do arquivo contendo o código que chamou o construtor de Error().
lineNumber 
Opcional. O valor da propriedade lineNumber no objeto de Error criado. O padrão é o número da linha contendo a invocação do construtor Error().
DescriçãoEDIT
Erros em tempo de execução resultam em novos objetos Error sendo criados e lançados.

Esta página documenta o uso do objeto Error em si e seu uso como uma função construtora. Para uma lista de propriedades e métodos herdados por instâncias de Error, veja Error.prototype.

Tipos de erro

Além do construtor genérico de Error, existem outros seis construtores principais de erro  no JavaScript. Para exceções em client-side, veja Excessões na captura de Instruções.

EvalError
Cria uma instância representando um erro que ocorre na função global. eval().
InternalError 
Cria uma instância representando um erro que ocorre quando um erro interno na engine do JavaScript é lançado. Ex: "too much recursion".
RangeError
Cria uma instância representando um erro que ocorre quando um valor ou parâmetro numérico está fora de seus limites válidos.
ReferenceError
Cria uma instância representando um erro que ocorre ao de-referenciar uma referência inválida.
SyntaxError
Cria uma instância representando um erro que ocorre ao fazer o parse do código em eval().
TypeError
Cria uma instância representando um erro que ocorre quando uma variável ou parâmetro não é de um tipo válido.
URIError
Cria uma instância representando um erro que ocorre quando são passados parâmetros inválidos para encodeURI() ou decodeURI().
PropriedadesEDIT
Error.prototype
Permite a criação de propriedades para instâncias de Error.
MétodosEDIT
O objeto Error global não contém métodos próprios, entretanto, ele herda alguns métodos através da cadeia de prototypes.

Instâncias de ErrorEDIT
All Error instances and instances of non-generic errors inherit from Error.prototype. As with all constructor functions, you can use the prototype of the constructor to add properties or methods to all instances created with that constructor.

Propriedades

Standard properties

Error.prototype.constructor
Specifies the function that created an instance's prototype.
Error.prototype.message
Error message.
Error.prototype.name
Error name.
Vendor-specific extensions

Non-standard
This feature is non-standard and is not on a standards track. Do not use it on production sites facing the Web: it will not work for every user. There may also be large incompatibilities between implementations and the behavior may change in the future.
Microsoft

Error.prototype.description
Error description. Similar to message.
Error.prototype.number
Error number.
Mozilla

Error.prototype.fileName
Path to file that raised this error.
Error.prototype.lineNumber
Line number in file that raised this error.
Error.prototype.columnNumber
Column number in line that raised this error.
Error.prototype.stack
Stack trace.
Métodos

Error.prototype.toSource() 
Returns a string containing the source of the specified Error object; you can use this value to create a new object. Overrides the Object.prototype.toSource() method.
Error.prototype.toString()
Returns a string representing the specified object. Overrides the Object.prototype.toString() method.
ExemplosEDIT
Lançando um erro genérico

Geralmente você cria um objeto Error com a intenção de lançá-lo usando a palavra-chave throw. Você pode capturar o erro usando uma construção de try...catch:

try {
  throw new Error('Oooops!');
} catch (e) {
  alert(e.name + ': ' + e.message);
}
Capturando um erro específico

Você pode escolher por capturar apenas tipos de erro específicos testando o tipo do erro com a propriedade constructor de erro ou, se você está escrevendo para engines de JavaScript modernas, a palavra-chave instanceof:

try {
  Objeto.Metodo();
} catch (e) {
  if (e instanceof EvalError) {
    alert(e.name + ': ' + e.message);
  } else if (e instanceof RangeError) {
    alert(e.name + ': ' + e.message);
  }
  // ... etc
}
Tipos de erro customizados

Você pode escolher definir seus próprios tipos de erro derivando de Error para conseguir usar throw new MeuErro() e usar instanceof MeuErro para checar o tipo de erro na captura da exceção. A forma comum para isso está demonstrada abaixo
*/