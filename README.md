Turkish PropBank (TRopBank)
============

Turkish PropBank (TRopBank) is a corpus of over 17.000 Turkish verbs, each annotated with their syntactic arguments and thematic roles. Arguments are bits of essential information attached to a verb (such as subject or object), and thematic roles are semantic classifications associated with these arguments (such as agent or patient). This resource allows matching between the syntax layer and the semantics layer for the processing of Turkish data.

In the field of SRL, PropBank is one of the studies widely recognized by the computational linguistics communities. PropBank is the bank of propositions where predicate- argument information of the corpora is annotated, and the semantic roles or arguments that each verb can take are posited.

Each verb has a frame file, which contains arguments applicable to that verb. Frame files may include more than one roleset with respect to the senses of the given verb. In the roleset of a verb sense, argument labels Arg0 to Arg5 are described according to the meaning of the verb. For the example below, the predicate is “announce” from PropBank, Arg0 is “announcer”, Arg1 is “entity announced”, and ArgM- TMP is “time attribute”.

[<sub>ARG0</sub> Türk Hava Yolları] [<sub>ARG1</sub> indirimli satışlarını] [<sub>ARGM-TMP</sub> bu Pazartesi] [<sub>PREDICATE</sub> açıkladı].

[<sub>ARG0</sub> Turkish Airlines] [<sub>PREDICATE</sub> announced] [<sub>ARG1</sub> its discounted fares] [<sub>ARGM-TMP</sub> this Monday].

The following Table shows typical semantic role types. Only Arg0 and Arg1 indicate the same thematic roles across different verbs: Arg0 stands for the Agent or Causer and Arg1 is the Patient or Theme. The rest of the thematic roles can vary across different verbs. They can stand for Instrument, Start point, End point, Beneficiary, or Attribute. Moreover, PropBank uses ArgM’s as modifier labels indicating time, location, temporal, goal, cause etc., where the role is not specific to a single verb group; it generalizes over the entire corpus instead.

|Tag|Meaning|
|---|---|
|Arg0|Agent or Causer|
|ArgM-EXT|Extent|
|Arg1|Patient or Theme|
|ArgM-LOC|Locatives|
|Arg2|Instrument, start point, end point, beneficiary, or attribute|
|ArgM-CAU|Cause|
|ArgM-MNR|Manner|
|ArgM-DIS|Discourse|
|ArgM-ADV|Adverbials|
|ArgM-DIR|Directionals|
|ArgM-PNC|Purpose|
|ArgM-TMP|Temporals|

+ Directional modifiers give information regarding the path of motion in the sentence. Directional modifiers may be mistakenly tagged as locatives.
+ Locatives are used for the place where the action takes place.
+ Manners define how the action is performed.
+ Extent markers represent the amount of change that occurs in the action.
+ Temporal modifiers keep the time of the action.
+ Reciprocals are reflexives that refer to other arguments, like “himself,” “itself,” “together,” “each other,” and “both.”
+ Secondary predication markers are used for adjuncts of the predicate, which holds predicate structure.
+ Purpose clauses show the motivation for the action. Cause clauses simply show the reason for an action.
+ Discourse markers connect the sentence to the previous sentence, such as “also,” “however,” “as well,” and “but.”
+ Adverbials are used for syntactic elements that modify the sentence and are not labeled with one of the modifier tags stated above.
+ “Will,” “may,” “can,” “must,” “shall,” “might,” “should,” “could,” “would,” and also “going (to),” “have (to),” and “used (to)” are modality adjuncts of the predicate and tagged as modal in PropBank.
+ Negation is used to tag negative markers of the sentences.

## Data Format

The structure of a sample frameset is as follows:

	<FRAMESET id="TR10-0006410">
		<ARG name="ARG0">Engeli kaldıran kişi</ARG>
		<ARG name="ARG1">Engelini kaldırdığı şey</ARG>
	</FRAMESET>

Each entry in the frame file is enclosed by <FRAMESET> and </FRAMESET> tags. id shows the unique identifier given to the frameset, which is the same ID in the synset file of the corresponding verb sense. <ARG> tags denote the semantic roles of the corresponding frame.

Simple Web Interface
============
[Link 1](https://starlangsoftware.github.io/nlptoolkit-web-simple/turkish-propbank.html) [Link 2](http://104.247.163.162/nlptoolkit/turkish-propbank.html)

Video Lectures
============

[<img src=video.jpg width="50%">](https://youtu.be/TeVnGaYuORQ)

For Developers
============

You can also see [Java](https://github.com/starlangsoftware/TurkishPropBank), [Python](https://github.com/starlangsoftware/TurkishPropBank-Py), [Cython](https://github.com/starlangsoftware/TurkishPropBank-Cy), [Js](https://github.com/starlangsoftware/TurkishPropBank-Js), [C#](https://github.com/starlangsoftware/TurkishPropBank-CS), [Swift](https://github.com/starlangsoftware/TurkishPropBank-Swift), or [C++](https://github.com/starlangsoftware/TurkishPropBank-CPP) repository.

## Requirements

* [Php 8.4 or higher](#php)
* [Git](#git)

### Php 

To check if you have a compatible version of Php installed, use the following command:

    php -V
    
You can find the latest version of Php [here](https://www.php.net/downloads/).

### Git

Install the [latest version of Git](https://git-scm.com/book/en/v2/Getting-Started-Installing-Git).

## Download Code

In order to work on code, create a fork from GitHub page. 
Use Git for cloning the code to your local or below line for Ubuntu:

	git clone <your-fork-git-link>

A directory called PropBank will be created. Or you can use below link for exploring the code:

	git clone https://github.com/starlangsoftware/TurkishPropBank-Php.git

## Open project with PhpStorm IDE

Steps for opening the cloned project:

* Start IDE
* Select **File | Open** from main menu
* Choose `PropBank-Php` file
* Select open as project option
* Couple of seconds, dependencies will be downloaded.
 
For Contibutors
============

### composer.json file

1. autoload is important when this package will be imported.
```
  "autoload": {
    "psr-4": {
      "olcaytaner\\WordNet\\": "src/"
    }
  },
```
2. Dependencies should be maximum (not only direct but also indirect references should also be given), everything directly in the code should be given here.
```
  "require-dev": {
    "phpunit/phpunit": "11.4.0",
    "olcaytaner/dictionary": "1.0.0",
    "olcaytaner/xmlparser": "1.0.1",
    "olcaytaner/morphologicalanalysis": "1.0.0"
  }
```

### Data files
1. Add data files to the project folder. Subprojects should include all data files of the parent projects.

### Php files

1. Do not forget to comment each function.
```
    /**
     * Returns true if specified semantic relation type presents in the relations list.
     *
     * @param SemanticRelationType $relationType element whose presence in the list is to be tested
     * @return bool true if specified semantic relation type presents in the relations list
     */
    public function containsRelationType(SemanticRelationType $relationType): bool{
        foreach ($this->relations as $relation){
            if ($relation instanceof SematicRelation && $relation->getRelationType() == $relationType){
                return true;
            }
        }
        return false;
    }
```
2. Function names should follow caml case.
```
    public function getRelation(int $index): Relation{
```
3. Write getter and setter methods.
```
    public function getOrigin(): ?string
    public function setName(string $name): void
```
4. Use standard javascript test style by extending the TestCase class. Use setup when necessary.
```
class WordNetTest extends TestCase
{
    private WordNet $turkish;

    protected function setUp(): void
    {
        ini_set('memory_limit', '450M');
        $this->turkish = new WordNet();
    }

    public function testSize()
    {
        $this->assertEquals(78327, $this->turkish->size());
    }
```
5. Enumerated types should be declared with enum.
```
enum CategoryType
{
    case MATHEMATICS;
    case SPORT;
    case MUSIC;
    case SLANG;
    case BOTANIC;
```
6. If there are multiple constructors for a class, define them as constructor1, constructor2, ..., then from the original constructor call these methods.
```
    public function constructor1(string $path, string $fileName): void
    public function constructor2(string $path, string $extension, int $index): void
    public function __construct(string $path, string $extension, ?int $index = null)
```
7. Use __toString method if necessary to create strings from objects.
```
    public function __toString(): string
```
8. Use xmlparser package for parsing xml files.
```
  $doc = new XmlDocument("../test.xml");
  $doc->parse();
  $root = $doc->getFirstChild();
  $firstChild = $root->getFirstChild();
```
